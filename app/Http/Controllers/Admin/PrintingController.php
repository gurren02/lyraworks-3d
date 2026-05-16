<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrintJob;
use App\Models\User;
use App\Models\Printer;
use App\Models\Material;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PrintingController extends Controller
{
    public function index()
    {
        return view('admin.printing.index');
    }

    public function create()
    {
        $employees = User::whereDoesntHave('roles', function($q) {
            $q->where('name', 'customer');
        })->get();
        $customers = User::role('customer')->get();
        $printers = Printer::all();
        $materials = Material::all();
        
        return view('admin.printing.create', compact('employees', 'customers', 'printers', 'materials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:users,id',
            'customer_id' => 'required|exists:users,id',
            'printer_id' => 'required|exists:printers,id',
            'start_date' => 'required|date',
            'materials' => 'required|array',
            'materials.*' => 'exists:materials,id'
        ]);

        $printJob = PrintJob::create([
            'employee_id' => $request->employee_id,
            'customer_id' => $request->customer_id,
            'printer_id' => $request->printer_id,
            'start_date' => $request->start_date,
            'status' => 'in_progress'
        ]);

        $printJob->materials()->sync($request->materials);

        return redirect()->route('admin.printing.index')->with('success', 'Impresión creada exitosamente.');
    }

    public function edit(PrintJob $printing)
    {
        $employees = User::whereDoesntHave('roles', function($q) {
            $q->where('name', 'customer');
        })->get();
        $customers = User::role('customer')->get();
        $printers = Printer::all();
        $materials = Material::all();
        $selectedMaterials = $printing->materials->pluck('id')->toArray();

        return view('admin.printing.edit', compact('printing', 'employees', 'customers', 'printers', 'materials', 'selectedMaterials'));
    }

    public function update(Request $request, PrintJob $printing)
    {
        $request->validate([
            'employee_id' => 'required|exists:users,id',
            'customer_id' => 'required|exists:users,id',
            'printer_id' => 'required|exists:printers,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'status' => 'required|in:in_progress,finished,cancelled',
            'materials' => 'required|array',
            'materials.*' => 'exists:materials,id'
        ]);

        $printing->update($request->only(['employee_id', 'customer_id', 'printer_id', 'start_date', 'end_date', 'status']));
        $printing->materials()->sync($request->materials);

        return redirect()->route('admin.printing.index')->with('success', 'Impresión actualizada exitosamente.');
    }

    public function finish(PrintJob $printing)
    {
        $printing->update([
            'status' => 'finished',
            'end_date' => now()
        ]);

        // Crear el registro de envío
        \App\Models\Delivery::create([
            'print_job_id' => $printing->id,
            'customer_id' => $printing->customer_id,
            'scheduled_date' => now()->addDays(7),
            'status' => 'pending'
        ]);

        return redirect()->route('admin.printing.index')->with('success', 'Trabajo finalizado y enviado a la sección de entregas.');
    }

    public function destroy(PrintJob $printing)
    {
        $printing->delete();
        return redirect()->route('admin.printing.index')->with('success', 'Impresión eliminada exitosamente.');
    }
}
