<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\CalendarSchedule;

class UpcomingMaintenanceNotification extends Notification
{
    use Queueable;

    protected $schedule;

    public function __construct($schedule)
    {
        $this->schedule = $schedule;
    }

    public function via($notifiable)
    {
        return ['mail', 'database']; // bisa diubah jadi ['database'] jika tanpa email
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('📅 Jadwal Perawatan Hari Ini')
            ->greeting('Halo, ' . $notifiable->name)
            ->line('Terdapat jadwal perawatan mesin hari ini:')
            ->line('🛠️ Mesin: ' . $this->schedule->machine_code)
            ->line('📌 Judul: ' . $this->schedule->title)
            ->line('📅 Periode: ' . $this->schedule->start->format('d-m-Y') . ' s.d ' . $this->schedule->end->format('d-m-Y'))
            ->line('📝 Keterangan: ' . $this->schedule->description)
            ->line('Segera lakukan tindakan sesuai jadwal.')
            ->salutation('Salam, Sistem Monitoring Perawatan Mesin');
    }

    public function toArray($notifiable)
    {
        return [
            'title' => 'Jadwal Perawatan Hari Ini',
            'machine' => $this->schedule->machine_code,
            'date' => $this->schedule->start->toDateString(),
            'description' => $this->schedule->description,
        ];
    }
}
