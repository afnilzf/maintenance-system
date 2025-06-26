<?php

namespace App\Http\Controllers;

use App\Models\{Machine, User, Sparepart, SparepartHistory, SparepartReplacement};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SparepartReplacementController extends Controller
{
    public function index()
    {
        $replacements = SparepartReplacement::with(['machine', 'sparepart'])->latest()->get();
        return view('admin.replacements.index', compact('replacements'));
    }

    public function create()
    {
        $machines = Machine::whereHas('latestChecklist')->get();
        $spareparts = Sparepart::where('stock', '>', 0)->get();
        return view('admin.replacements.create', compact('machines', 'spareparts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'machine_id' => 'required|exists:machines,id',
            'sparepart_id' => 'required|exists:spareparts,id',
            'replacement_date' => 'required|date',
            'quantity' => 'required|integer|min:1',
            'note' => 'nullable|string',
        ]);

        $sparepart = Sparepart::findOrFail($validated['sparepart_id']);

        if ($sparepart->stock < $validated['quantity']) {
            return redirect()->back()->with('error', 'Stok suku cadang tidak mencukupi.');
        }

        // Tambah informasi pengguna berdasarkan peran
        if (Auth::user()->role === 'admin') {
            $validated['replaced_by'] = $request->input('replaced_by');
            if (!$validated['replaced_by'] || !User::where('id', $validated['replaced_by'])->where('role', 'plp')->exists()) {
                return redirect()->back()->with('error', 'PLP tidak valid atau belum dipilih.');
            }
        } else {
            $validated['replaced_by'] = Auth::id();
        }

        $replacement = SparepartReplacement::create($validated);

        // Kurangi stok
        $sparepart->decrement('stock', $validated['quantity']);

        // Catat ke riwayat penggunaan
        SparepartHistory::create([
            'sparepart_id' => $sparepart->id,
            'type' => 'out',
            'quantity' => $validated['quantity'],
            'unit' => $sparepart->unit,
            'note' => $validated['note'],
            'requested_by' => $validated['replaced_by'],
            'machine_id' => $validated['machine_id'],
        ]);

        return redirect()->route('replacements.index')->with('success', 'Penggantian suku cadang berhasil disimpan.');
    }
}
