<?php

namespace App\Exports;

use App\Models\MaintenanceRequest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Http\Request;

class MaintenanceExport implements FromCollection, WithHeadings
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $query = MaintenanceRequest::with('machine');

        if ($this->request->filled('machine_id')) {
            $query->where('machine_id', $this->request->machine_id);
        }

        if ($this->request->filled('start_date') && $this->request->filled('end_date')) {
            $query->whereBetween('created_at', [
                $this->request->start_date,
                $this->request->end_date
            ]);
        }

        return $query->get()->map(function ($item) {
            return [
                'Kode Mesin' => $item->machine->code ?? '-',
                'Nama Mesin' => $item->machine->name ?? '-',
                'Periode' => $item->period_month . '-' . $item->period_year,
                'Status' => ucfirst($item->approval_status),
                'Tanggal Pengajuan' => $item->created_at->format('Y-m-d'),
                'Deskripsi' => $item->description,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Kode Mesin',
            'Nama Mesin',
            'Periode',
            'Status',
            'Tanggal Pengajuan',
            'Deskripsi',
        ];
    }
}
