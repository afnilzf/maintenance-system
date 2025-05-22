<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mesin;

class MesinController extends Controller
{
    public function index()
    {
        $mesins = Mesin::all();
        return view('admin.mesin.index', compact('mesins'));
    }

    public function create()
    {
        return view('admin.mesin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|max:100|unique:mesins,kode',
            'lokasi' => 'nullable|string|max:255',
            'jenis' => 'nullable|string|max:255',
        ]);

        Mesin::create([
            'nama' => $request->nama,
            'kode' => $request->kode,
            'lokasi' => $request->lokasi,
            'jenis' => $request->jenis,
        ]);

        return redirect()->route('mesin.index')->with('success', 'Data mesin berhasil ditambahkan.');
    }
}
