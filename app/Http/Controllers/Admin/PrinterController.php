<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Printer;
use Illuminate\Http\Request;

class PrinterController extends Controller
{
    public function create()
    {
        return view('admin.inventory.printers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'model' => 'nullable|string|max:100',
            'technology' => 'required|in:FDM,SLA,Resin',
            'status' => 'required|string',
        ]);

        Printer::create($request->all());

        return redirect()->route('admin.inventory.index', ['tab' => 'printers'])->with('success', 'Impresora creada exitosamente.');
    }

    public function edit(Printer $printer)
    {
        return view('admin.inventory.printers.edit', compact('printer'));
    }

    public function update(Request $request, Printer $printer)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'model' => 'nullable|string|max:100',
            'technology' => 'required|in:FDM,SLA,Resin',
            'status' => 'required|string',
        ]);

        $printer->update($request->all());

        return redirect()->route('admin.inventory.index', ['tab' => 'printers'])->with('success', 'Impresora actualizada exitosamente.');
    }

    public function destroy(Printer $printer)
    {
        $printer->delete();
        return redirect()->route('admin.inventory.index', ['tab' => 'printers'])->with('success', 'Impresora eliminada exitosamente.');
    }
}
