<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class MachineController extends Controller
{
    //
    public function index()
    {
        $machines = Machine::with('components')->get();
        return view('admin.machines.index', compact('machines'));
    }

    public function create()
    {
        return view('admin.machines.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->validationRules());

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            Log::info('Uploaded file info', [
                'original_name' => $file->getClientOriginalName(),
                'mime' => $file->getMimeType(),
                'size' => $file->getSize(),
                'valid' => $file->isValid(),
            ]);

            if ($file && $file->isValid()) {
                $filename = time() . '-' . $file->getClientOriginalName();
                $validated['image'] = $file->storeAs('machine_images', $filename, 'public');
            } else {
                unset($validated['image']);
            }
        }

        $validated['created_by'] = Auth::id();

        Machine::create($validated);

        return redirect()->route('machines.index')->with('success', 'Machine successfully added.');
    }

    public function edit(Machine $machine)
    {
        return view('admin.machines.edit', compact('machine'));
    }

    public function update(Request $request, Machine $machine)
    {
        $validated = $request->validate($this->validationRules($machine->id));

        if ($request->hasFile('image')) {
            if ($machine->image) {
                Storage::disk('public')->delete($machine->image);
            }

            $file = $request->file('image');

            if ($file && $file->isValid()) {
                $filename = time() . '-' . $file->getClientOriginalName();
                $validated['image'] = $file->storeAs('machine_images', $filename, 'public');
            } else {
                Log::warning('File is not valid or null', ['file' => $file]);
                unset($validated['image']);
            }
        }

        $machine->update($validated);

        return redirect()->route('machines.index')->with('success', 'Machine updated successfully.');
    }

    public function destroy(Machine $machine)
    {
        if ($machine->image) {
            Storage::disk('public')->delete($machine->image);
        }

        $machine->delete();

        return redirect()->route('machines.index')->with('success', 'Machine deleted successfully.');
    }

    private function validationRules($id = null)
    {
        return [
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:machines,code,' . $id,
            'type' => 'nullable|string',
            'inventory_number' => 'nullable|string',
            'year_acquired' => 'nullable|digits:4|integer|min:1900|max:' . date('Y'),
            'status' => 'required|in:Aktif,Tidak Aktif',
            'condition' => 'required|in:Baik,Rusak',
            'length' => 'nullable|numeric',
            'width' => 'nullable|numeric',
            'height' => 'nullable|numeric',
            'power' => 'nullable|string',
            'supplier' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ];
    }
}
