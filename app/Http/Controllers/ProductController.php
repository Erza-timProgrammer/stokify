<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\ActivityLog;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Services\ProductService;

class ProductController extends Controller
{
    protected $productService;

    /**
     * Injeksi ProductService melalui constructor.
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    // Menampilkan form tambah produk
    public function create()
    {
        $name = auth()->user()->name;
        $email = auth()->user()->email;
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('admin.menu.product.create', compact('name', 'email', 'categories', 'suppliers'));
    }

    // Menyimpan data produk baru
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'category_id'     => 'required|exists:categories,id',
            'supplier_id'     => 'required|exists:suppliers,id',
            'name'            => 'required|string|max:255',
            'sku'             => 'required|string|unique:products,sku|max:13',
            'description'     => 'nullable|string',
            'purchase_price'  => 'required|numeric|min:0',
            'selling_price'   => 'required|numeric|min:0',
            'image'           => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'attributes.*.name'  => 'required|string|max:50',
            'attributes.*.value' => 'required|string|max:50',
        ]);

        // Upload gambar (jika ada)
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image'] = $imagePath;
        }

        // Simpan data produk menggunakan ProductService
        $product = $this->productService->createProduct($validated);

        // Simpan atribut produk jika ada
        if (isset($validated['attributes'])) {
            foreach ($validated['attributes'] as $attribute) {
                $product->attributes()->create([
                    'name'  => $attribute['name'],
                    'value' => $attribute['value'],
                ]);
            }
        }

        return redirect()->route('admin.menu.product')->with('success', 'Produk berhasil ditambahkan!');
    }

    // Menampilkan form edit produk
    public function edit($id)
    {
        $adminName = auth()->user()->name;
        $adminemail = auth()->user()->email;
        $product = $this->productService->getProductById($id);
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('admin.menu.product.edit', [
            'name'       => $adminName,
            'email'      => $adminemail,
            'product'    => $product,
            'categories' => $categories,
            'suppliers'  => $suppliers,
        ]);
    }

    // Memperbarui produk
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'category_id'     => 'required|exists:categories,id',
            'supplier_id'     => 'required|exists:suppliers,id',
            'name'            => 'required|string|max:255',
            'sku'             => 'required|string|max:13|unique:products,sku,' . $product->id,
            'description'     => 'nullable|string',
            'purchase_price'  => 'required|numeric|min:0',
            'selling_price'   => 'required|numeric|min:0',
            'image'           => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Handle image update
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image'] = $imagePath;
        }

        // Perbarui data produk menggunakan ProductService
        $this->productService->updateProduct($product, $validated);
        $product->refresh();

        // Catat log aktivitas update produk
        if (auth()->check()) {
            $detailLog = 'Update produk: ' . $product->name . ', pada ' . now()->format('Y-m-d H:i:s');
            ActivityLog::create([
                'user_id'  => auth()->id(),
                'activity' => 'Update Produk',
                'detail'   => $detailLog,
            ]);
        }

        return redirect()->route('admin.menu.product')->with('success', 'Produk berhasil diperbarui!');
    }

    // Menghapus produk
    public function destroy($id)
    {
        $product = $this->productService->getProductById($id);
        $detailLog = 'User menghapus produk: ' . $product->name . ', pada ' . now()->format('Y-m-d H:i:s');

        $this->productService->deleteProduct($product);

        if (auth()->check()) {
            ActivityLog::create([
                'user_id'  => auth()->id(),
                'activity' => 'Hapus Produk',
                'detail'   => $detailLog,
            ]);
        }

        return redirect()->route('admin.menu.product')->with('success', 'Produk berhasil dihapus');
    }

    public function export()
    {
        return Excel::download(new ProductsExport, 'products.csv', \Maatwebsite\Excel\Excel::CSV, [
            'Content-Type' => 'text/csv',
        ]);
    }

    public function import(Request $request)
    {
        try {
            $request->validate([
                'file' => 'required|mimes:csv,txt|max:2048'
            ]);

            Excel::import(new ProductsImport, $request->file('file'));

            if (auth()->check()) {
                ActivityLog::create([
                    'user_id'  => auth()->id(),
                    'activity' => 'Import Produk',
                    'detail'   => 'User mengimport data produk pada ' . now()->format('Y-m-d H:i:s'),
                ]);
            }

            return redirect()->back()->with('success', 'Data produk berhasil diimport!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat import: ' . $e->getMessage());
        }
    }

    public function search(Request $request)
    {
        $keyword = $request->input('q');
        $products = Product::where('name', 'LIKE', "%{$keyword}%")->take(5)->get();

        return response()->json($products);
    }

    public function show($id)
    {
        $name  = auth()->user()->name;
        $email = auth()->user()->email;
        // Mengambil produk berdasarkan ID menggunakan ProductService atau langsung dari model
        $product = $this->productService->getProductById($id);
        
        // Kembalikan view khusus untuk preview produk bagi manajer
        return view('manajer.menu.product.show', compact('name', 'email', 'product'));
    }
}