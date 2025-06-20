<?php

namespace App\Http\Controllers;

use App\Models\Sparepart;
use App\Models\SparepartRequest;
use App\Models\SparepartHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class SparepartController extends Controller
{
    public function index()
    {
        $spareparts = Sparepart::all();
        return view('admin.spareparts.index', compact('spareparts'));
    }

    public function create()
    {
        return view('admin.spareparts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'specification' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'unit' => 'required|string',
            'supplier' => 'nullable|string',
        ]);

        $sparepart = Sparepart::create($validated);

        SparepartHistory::create([
            'sparepart_id' => $sparepart->id,
            'type' => 'in',
            'quantity' => $validated['stock'],
            'unit' => $validated['unit'],
            'supplier' => $validated['supplier'],
            'requested_by' => Auth::id(),
        ]);

        return redirect()->route('spareparts.index')->with('success', 'Suku cadang berhasil ditambahkan.');
    }

    public function requestForm(Sparepart $sparepart)
    {
        $users = Auth::user()->role === 'admin' ? \App\Models\User::where('role', 'plp')->get() : null;
        return view('admin.spareparts.request', compact('sparepart', 'users'));
    }

    public function submitRequest(Request $request, Sparepart $sparepart)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'requested_by' => 'nullable|exists:users,id',
        ]);

        $validated['requested_by'] = Auth::user()->role === 'admin'
            ? ($validated['requested_by'] ?? null)
            : Auth::id();

        $validated['sparepart_id'] = $sparepart->id; // Pastikan ini tidak null

        if ($sparepart->pendingRequest) {
            return redirect()->back()->with('error', 'Pengajuan sudah ada dan sedang menunggu persetujuan.');
        }

        SparepartRequest::create($validated);

        return redirect()->route('spareparts.index')->with('success', 'Pengajuan pembelian berhasil dikirim.');
    }


    public function history()
    {
        $inHistory = SparepartHistory::where('type', 'in')->get();
        $outHistory = SparepartHistory::where('type', 'out')->get();

        return view('admin.spareparts.history', compact('inHistory', 'outHistory'));
    }

    public function printRequest(SparepartRequest $request)
    {
        $pdf = Pdf::loadView('admin.spareparts.request_pdf', compact('request'));
        return $pdf->download('Pengajuan_Sparepart_' . $request->id . '.pdf');
    }

    public function listrequests()
    {
        $requests = SparepartRequest::with(['sparepart', 'requestedBy'])->latest()->get();
        return view('admin.spareparts.request', compact('requests'));
    }
    public function approveRequest(SparepartRequest $request)
    {
        DB::transaction(function () use ($request) {
            $request->update(['status' => 'approved']);

            // Ambil ulang sparepart agar tidak null
            $sparepart = $request->sparepart;


            if (!$sparepart) {
                throw new \Exception('Sparepart not found.');
            }

            $sparepart->increment('stock', $request->quantity);

            SparepartHistory::create([
                'sparepart_id' => $sparepart->id,
                'type' => 'in',
                'quantity' => $request->quantity,
                'unit' => $sparepart->unit,
                'supplier' => $sparepart->supplier,
                'requested_by' => $request->requested_by,
            ]);
        });

        if ($request->status === 'approved') {
            return redirect()->back()->with('error', 'Pengajuan ini sudah disetujui.');
        }
    }


    public function rejectRequest(SparepartRequest $request)
    {
        $request->update(['status' => 'rejected']);
        return redirect()->back()->with('success', 'Pengajuan telah ditolak.');
    }
}
