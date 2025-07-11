# Sistem Manajemen Perawatan Mesin - Schema Maintenance

Sistem ini merupakan aplikasi berbasis web yang dibangun menggunakan **Laravel** untuk membantu manajemen perawatan mesin, seperti pengelolaan data mesin, pemeriksaan berkala, perbaikan, penggantian suku cadang, hingga notifikasi otomatis.

---
## 📁 Struktur Folder

| Folder / File                | Penjelasan |
|-----------------------------|------------|
| `.env`                      | File konfigurasi aplikasi |
| `routes/web.php`            | Routing utama web |
| `database/migrations/`      | Struktur database |
| `database/seeders/`         | Untuk generate dummy data |
| `app/Models/`               | Model Eloquent ORM |
| `app/Http/Controllers/`     | Controller aplikasi |
| `resources/views/`          | Blade templates (View) |
| `resources/views/layouts/`  | Layout blade seperti `admin.blade.php` |
| `resources/views/partials/` | Navbar, sidebar, content wrapper |
| `public/admin-assets/`      | Asset Admin Template |
| `public/storage/`           | Lokasi file penyimpanan mesin, bukti dll |
| `vendor/`                   | Folder otomatis composer untuk library |
| `php artisan notify:maintenance-today` | Menjalankan notifikasi manual |

---
## 🔐 Fitur Autentikasi

Menggunakan Laravel Breeze:

- Login, Register, Verifikasi Email, Reset Password
- Tersedia layout dasar dengan Blade

## 📦 Library Pihak Ketiga

- `maatwebsite/excel` : Export data ke Excel
- `barryvdh/laravel-dompdf` : Export PDF
- `laravel/breeze` : Autentikasi sederhana
- `fullcalendar.js` : Kalender interaktif

## 🔄 Notifikasi Otomatis

- Menggunakan Laravel Task Scheduler
- Command: `php artisan notify:maintenance-today`
- Mengirim notifikasi email dan sistem jika ada jadwal perawatan hari ini
- Scheduler dapat di-setup otomatis di Task Scheduler (Windows) atau cron (Linux)

## 📌 Notifikasi UI

- Menampilkan 5 notifikasi terbaru
- Tersedia tombol "Lihat Semua"
- Menandai sebagai dibaca (mark as read) melalui tombol
- Tersinkronisasi antar akun (misal: PLP dibaca, maka Kepala Jurusan pun ditandai dibaca)

## 🧠 Logika Kondisi Mesin

```text
- B = Baik
- O = Sedang
- Rs = Rusak (Sudah Diperbaiki)
- Rb = Rusak (Belum Diperbaiki)

Status Mesin:
- Jika B paling banyak → Baik
- Jika ada Rb → Rusak
- Jika O terbanyak → Sedang
- Jika Rs terbanyak → Rusak (Sudah Diperbaiki)
```

---

## 🧠 Penjelasan Query dan Model (Laravel 12)

Pada Laravel 12, model semakin powerful karena:

- Menggunakan **Eloquent ORM** sebagai dasar pengambilan dan relasi data
- Fitur seperti **with()**, **whereHas()**, **hasMany()**, **belongsTo()**, **pluck()**, **firstWhere()** membuat Eloquent bisa menggantikan raw query & query builder secara efisien
- Relasi antar model digunakan untuk join antar tabel
- Pencarian data menggunakan kombinasi filter langsung di query chain (`Model::where(...)->where(...)->get()`)

Contoh:

```php
// Ambil mesin yang belum diperbaiki
$availableMachines = Machine::whereIn('id', $machines)
    ->whereNotIn('id', $repairedMachineIds)
    ->get();
```
---

## 📊 Daftar Menu dan File MVC Terkait

| Menu                    | View Blade                                  | Controller                   | Model              |
| ----------------------- | ------------------------------------------- | ---------------------------- | ------------------ |
| Dashboard               | admin/dashboard.blade.php                   | DashboardController          | -                  |
| Daftar Mesin            | admin/machines/index.blade.php              | MachineController            | Machine            |
| Tambah Mesin            | admin/machines/create.blade.php             | MachineController            | Machine            |
| Jadwal Perawatan        | admin/maintenance\_requests/index.blade.php | MaintenanceRequestController | MaintenanceRequest |
| Pemeriksaan Mesin       | admin/checklists/index.blade.php            | MachineChecklistController   | MachineChecklist   |
| Perbaikan Mesin         | admin/repairs/index.blade.php               | RepairLogController          | RepairLog          |
| Pergantian Suku Cadang  | admin/replacements/index.blade.php          | ReplacementPartController    | ReplacementPart    |
| Pengajuan Suku Cadang   | admin/spareparts/request.blade.php          | SparepartController          | SparepartRequest   |
| Riwayat Suku Cadang     | admin/spareparts/history.blade.php          | SparepartController          | SparepartHistory   |
| Laporan Data Mesin      | admin/reports/machines/index.blade.php      | ReportController             | Machine            |
| Laporan Perawatan Mesin | admin/reports/maintenance/index.blade.php   | ReportController             | MaintenanceRequest |
| Laporan Perbaikan Mesin | admin/reports/repairs/index.blade.php       | ReportController             | RepairLog          |
| Laporan Suku Cadang     | admin/reports/replacements/index.blade.php  | ReportController             | ReplacementPart    |
| Manajemen User          | admin/users/index.blade.php                 | UserManagementController     | User               |

## 🚀 Cara Menjalankan Notifikasi Otomatis

1. Tambahkan ini di `routes/console.php`

```php
Artisan::command('notify:maintenance-today', function () {
    Artisan::call('app:notify-maintenance');
});
```

2. Daftarkan `App\Console\Kernel.php`

```php
protected function schedule(Schedule $schedule)
{
    $schedule->command('notify:maintenance-today')->daily();
}
```

3. Untuk Windows: buat task di Task Scheduler menjalankan:

```bash
php artisan schedule:run
```

---


