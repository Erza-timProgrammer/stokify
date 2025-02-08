<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    public function index()
    {
        $name = Auth::user()->name;
        // Jika kamu tidak menggunakan role, kamu bisa menghilangkan variabel role
        $email = Auth::user()->email;
        $suppliers = Supplier::all();
        
        return view('admin.menu.supplier', compact('name', 'email', 'suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'address' => 'nullable|string',
            'phone'   => 'nullable|string|max:20',
            'email'   => 'nullable|email|max:255',
        ]);

        Supplier::create($request->only(['name', 'address', 'phone', 'email']));

        return redirect()->route('admin.menu.supplier')->with('success', 'Supplier berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $name = Auth::user()->name;
        $role = Auth::user()->role ?? 'admin';
        $supplier = Supplier::findOrFail($id);
        
        // Pastikan view untuk edit berada di folder yang sesuai
        return view('admin.menu.supplier_edit', compact('name', 'role', 'supplier'));
    }

    public function update(Request $request, $id)
    {
        $supplier = Supplier::findOrFail($id);
        
        $request->validate([
            'name'    => 'required|string|max:255',
            'address' => 'nullable|string',
            'phone'   => 'nullable|string|max:20',
            'email'   => 'nullable|email|max:255',
        ]);

        $supplier->update($request->only(['name', 'address', 'phone', 'email']));

        return redirect()->route('admin.menu.supplier')->with('success', 'Supplier berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Supplier::findOrFail($id)->delete();
        return redirect()->route('admin.menu.supplier')->with('success', 'Supplier berhasil dihapus!');
    }
}
