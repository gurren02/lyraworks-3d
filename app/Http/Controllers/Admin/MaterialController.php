<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function create()
    {
        return view('admin.inventory.materials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'color' => 'required|string',
            'stock_grams' => 'required|numeric|min:0',
            'price_per_gram' => 'required|numeric|min:0',
        ]);

        Material::create($request->all());

        return redirect()->route('admin.inventory.index', ['tab' => 'materials'])->with('success', 'Material creado exitosamente.');
    }

    public function edit(Material $material)
    {
        return view('admin.inventory.materials.edit', compact('material'));
    }

    public function update(Request $request, Material $material)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'color' => 'required|string',
            'stock_grams' => 'required|numeric|min:0',
            'price_per_gram' => 'required|numeric|min:0',
        ]);

        $material->update($request->all());

        return redirect()->route('admin.inventory.index', ['tab' => 'materials'])->with('success', 'Material actualizado exitosamente.');
    }

    public function destroy(Material $material)
    {
        $material->delete();
        return redirect()->route('admin.inventory.index', ['tab' => 'materials'])->with('success', 'Material eliminado exitosamente.');
    }
}
