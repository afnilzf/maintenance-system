<?php

namespace App\Exports;

use App\Models\SparepartReplacement;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Http\Request;

class ReplacementExport implements FromCollection, WithHeadings
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $query = SparepartReplacement::with(['sparepart', 'machine']);

        if ($this->request->filled('sparepart_id')) {
            $query->where('sparepart_id', $this->request->sparepart_id);
        }

        if ($this->request->filled('start_date') && $this->request->filled('end_date')) {
            $query->whereBetween('replacement_date', [$this->request->start_date, $this->request->end_date]);
        }

        return $query->get()->map(function ($item) {
            return [
                $item->replacement_date,
                $item->sparepart->name,
                $item->machine->name ?? '-',
                $item->quantity,
                $item->notes,
            ];
        });
    }

    public function headings(): array
    {
        return ['Tanggal', 'Sparepart', 'Mesin', 'Jumlah', 'Keterangan'];
    }
}
