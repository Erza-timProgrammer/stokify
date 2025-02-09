<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    /**
     * Mengambil semua produk.
     */
    public function getAllProducts()
    {
        return Product::all();
    }

    /**
     * Mengambil produk berdasarkan ID.
     */
    public function getProductById($id)
    {
        return Product::findOrFail($id);
    }

    /**
     * Membuat produk baru.
     */
    public function createProduct(array $data)
    {
        return Product::create($data);
    }

    /**
     * Memperbarui produk yang sudah ada.
     */
    public function updateProduct(Product $product, array $data)
    {
        $product->update($data);
        return $product;
    }

    /**
     * Menghapus produk.
     */
    public function deleteProduct(Product $product)
    {
        return $product->delete();
    }
}
