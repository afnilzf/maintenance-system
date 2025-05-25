<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\Machine;
use Illuminate\Http\Request;

class ComponentController extends Controller
{
    public function index(Machine $machine)
    {
        $components = $machine->components;
        return view('admin.components.index', compact('machine', 'components'));
    }

    public function create(Machine $machine)
    {
        // Ambil semua mesin yang memiliki komponen, selain mesin yang sedang dibuat
        $otherMachinesWithComponents = Machine::where('id', '!=', $machine->id)
            ->whereHas('components')
            ->get();

        return view('admin.components.create', compact('machine', 'otherMachinesWithComponents'));
    }

    public function store(Request $request, Machine $machine)
    {

        $validated = $request->validate([
            'components' => 'required|array|min:1',
            'components.*.name' => 'required|string|max:255',
            'components.*.measurement_criteria' => 'nullable|string|max:255',
        ]);

        foreach ($validated['components'] as $componentData) {
            $componentData['machine_id'] = $machine->id;
            // dd($componentData);
            Component::create($componentData);
        }

        return redirect()->route('machines.index')
            ->with('success', '✅ Komponen berhasil disimpan dan dikaitkan ke mesin.');
    }

    public function edit(Machine $machine)
    {
        return view('admin.components.edit', compact('machine'));
    }

    public function update(Request $request, Machine $machine)
    {
        $validated = $request->validate([
            'components' => 'required|array|min:1',
            'components.*.name' => 'required|string|max:255',
            'components.*.measurement_criteria' => 'nullable|string|max:255',
        ]);

        // Hapus semua komponen lama terlebih dahulu
        $machine->components()->delete();

        // Simpan komponen baru
        foreach ($validated['components'] as $componentData) {
            $componentData['machine_id'] = $machine->id;
            Component::create($componentData);
        }

        return redirect()->route('machines.index')->with('success', '✅ Komponen berhasil diperbarui.');
    }

    public function duplicateJson(Machine $machine)
    {
        return response()->json($machine->components);
    }

    public function destroy(Machine $machine, Component $component)
    {
        $component->delete();
        return back()->with('success', 'Component deleted successfully.');
    }
}
