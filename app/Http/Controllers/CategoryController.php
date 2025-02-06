<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Menampilkan form tambah kategori
    public function create()
    {
        if (!auth()->check()) {
            return back()->with('error', 'Anda harus login terlebih dahulu');
        }

        $adminName = auth()->user()->name;
        $adminemail = auth()->user()->email;

        return view('admin.menu.product.category.create', [
            'name' => $adminName,
            'email' => $adminemail
        ]);
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string', // atau required jika memang wajib diisi
        ]);

        Category::create($validated);

        return redirect('/admin/product')->with('success', 'Kategori berhasil ditambahkan!');
    }

    // Menampilkan form edit kategori
    public function edit($id)
    {
        $adminName = auth()->user()->name;
        $adminemail = auth()->user()->email;
        $category = Category::findOrFail($id);
        return view('admin.menu.product.category.edit', [
            'name' => $adminName,
            'email' => $adminemail,
            'category' => $category
        ]);
    }

    // Memperbarui kategori yang sudah ada
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
        ]);

        $category = Category::findOrFail($id);
        $category->update($validated);

        return redirect('/admin/product')->with('success', 'Kategori berhasil ditambahkan!');
    }

    // Menghapus kategori
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('success', 'Kategori berhasil dihapus!');
    }
}
