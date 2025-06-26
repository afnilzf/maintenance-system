<?php

namespace App\Exports;

use App\Models\Machine;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MachineExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Machine::select([
            'code',
            'name',
            'type',
            DB::raw('CASE WHEN status = "active" THEN "AKTIF" ELSE "Tidak Aktif" END AS status'),
            DB::raw('CASE 
                        WHEN `condition` = "good" THEN "B" 
                        WHEN `condition` = "medium" THEN "O" 
                        WHEN `condition` = "repaired" THEN "Rs" 
                        ELSE "Rb" 
                     END AS kondisi'),
            'supplier',
            'length',
            'width',
            'power',
            'repair_complexity',
            'description',
            'created_at'
        ])->get();
    }

    public function headings(): array
    {
        return [
            'Kode Mesin',
            'Nama Mesin',
            'Tipe',
            'Status',
            'Kondisi',
            'Supplier',
            'Panjang (m)',
            'Lebar (m)',
            'Daya',
            'Kompleksitas perbaikan',
            'Deskripsi',
            'Tanggan Upload Sistem',
        ];
    }
}
