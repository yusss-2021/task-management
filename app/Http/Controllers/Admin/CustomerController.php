<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('admin.clients.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nomor' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
        ]);

        Customer::create($request->only(['nama', 'nomor', 'alamat']));

        return redirect()->route('admin.clients.index')->with('success', 'Customer berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('admin.clients.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nomor' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update($request->only(['nama', 'nomor', 'alamat']));

        return redirect()->route('admin.clients.index')->with('success', 'Customer berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('admin.clients.index')->with('success', 'Customer berhasil dihapus.');
    }
}
