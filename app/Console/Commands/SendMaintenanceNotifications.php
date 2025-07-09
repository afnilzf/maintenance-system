<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\CalendarSchedule;
use App\Models\User;
use App\Notifications\UpcomingMaintenanceNotification;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;

class SendMaintenanceNotifications extends Command
{
    protected $signature = 'notify:maintenance-today';
    protected $description = 'Kirim notifikasi untuk jadwal perawatan hari ini';

    public function handle(): int
    {
        $today = Carbon::today()->toDateString();

        // Ambil jadwal perawatan yang dimulai hari ini
        $schedules = CalendarSchedule::whereDate('start', $today)->get();

        if ($schedules->isEmpty()) {
            $this->info('Tidak ada jadwal hari ini.');
            return Command::SUCCESS;
        }

        // Ambil semua user yang akan menerima notifikasi (misal: role != 'teknisi')
        $users = User::whereIn('role', ['admin', 'kepala_bengkel', 'kepala_jurusan', 'plp'])->get();

        foreach ($schedules as $schedule) {
            Notification::send($users, new UpcomingMaintenanceNotification($schedule));
        }

        $this->info("Notifikasi berhasil dikirim ke semua user.");
        return Command::SUCCESS;
    }
}
