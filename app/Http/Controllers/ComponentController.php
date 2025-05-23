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
        return view('admin.components.create', compact('machine'));
    }

    public function store(Request $request, Machine $machine)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'measurement_criteria' => 'nullable|string|max:255',
        ]);

        $validated['machine_id'] = $machine->id;
        Component::create($validated);

        return redirect()->route('components.index', $machine)->with('success', 'Component successfully added.');
    }

    public function destroy(Machine $machine, Component $component)
    {
        $component->delete();
        return back()->with('success', 'Component deleted successfully.');
    }
}
