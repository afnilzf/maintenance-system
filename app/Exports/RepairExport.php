<?php

namespace App\Exports;

use App\Models\RepairLog;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Http\Request;

class RepairExport implements FromCollection, WithHeadings
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $query = RepairLog::with('machine');

        if ($this->request->machine_id) {
            $query->where('machine_id', $this->request->machine_id);
        }

        if ($this->request->start_date && $this->request->end_date) {
            $query->whereBetween('repair_date_start', [$this->request->start_date, $this->request->end_date]);
        }

        return $query->get()->map(function ($log) {
            return [
                'Kode Mesin' => $log->machine->code,
                'Nama Mesin' => $log->machine->name,
                'Tanggal Mulai' => $log->repair_date_start,
                'Tanggal Selesai' => $log->repair_date_finish,
                'PLP' => $log->repairedBy->name ?? '-',
            ];
        });
    }

    public function headings(): array
    {
        return ['Kode Mesin', 'Nama Mesin', 'Tanggal Mulai', 'Tanggal Selesai', 'PLP'];
    }
}
