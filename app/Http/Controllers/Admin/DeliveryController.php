<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\User;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index()
    {
        return view('admin.delivery.index');
    }

    public function edit(Delivery $delivery)
    {
        // Empleados que pueden realizar entregas
        $shippers = User::whereDoesntHave('roles', function($q) {
            $q->where('name', 'customer');
        })->get();
        
        return view('admin.delivery.edit', compact('delivery', 'shippers'));
    }

    public function update(Request $request, Delivery $delivery)
    {
        $request->validate([
            'employee_id' => 'nullable|exists:users,id',
            'scheduled_date' => 'required|date',
            'address' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'status' => 'required|in:pending,delivered,cancelled'
        ]);

        $delivery->update($request->all());

        return redirect()->route('admin.delivery.index')->with('success', 'Envío actualizado exitosamente.');
    }

    public function finish(Delivery $delivery)
    {
        $delivery->update(['status' => 'delivered']);
        return redirect()->route('admin.delivery.index')->with('success', 'Envío marcado como entregado.');
    }

    public function destroy(Delivery $delivery)
    {
        $delivery->delete();
        return redirect()->route('admin.delivery.index')->with('success', 'Envío eliminado exitosamente.');
    }
}
