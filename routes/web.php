<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffGudangController;
use App\Http\Controllers\ManajerGudangController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockTransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/', [LoginController::class, 'index']);
Route::post('/', [LoginController::class, 'login']);

Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth', 'role:Admin']);
Route::get('/staff-gudang', [StaffGudangController::class, 'index'])->middleware(['auth', 'role:Staff Gudang']);
Route::get('/manajer-gudang', [ManajerGudangController::class, 'index'])->middleware(['auth', 'role:Manajer Gudang']);

Route::get('/admin', [AdminController::class, 'data'])->name('admin.dashboard')->middleware(['auth', 'role:Admin']);
Route::get('/staff-gudang', [StaffGudangController::class, 'data'])->name('staff.dashboard')->middleware(['auth', 'role:Staff Gudang']);
Route::get('/manajer-gudang', [ManajerGudangController::class, 'data'])->name('manajer.dashboard')->middleware(['auth', 'role:Manajer Gudang']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Menu dari Admin

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.menu.dashboard');
Route::get('/admin/product', [AdminController::class, 'product'])->name('admin.menu.product');
// Route::get('/admin/product/{product}/edit', [AdminController::class, 'edit'])->name('products.edit');
// Route::delete('/products/{product}', [AdminController::class, 'destroy'])->name('products.destroy');
// Route::put('admin/products/{product}', [AdminController::class, 'update'])->name('products.update');

Route::get('/admin/stock', [AdminController::class, 'stock'])->name('admin.menu.stock');
Route::get('/admin/supplier', [AdminController::class, 'supplier'])->name('admin.menu.supplier');
Route::get('/admin/user', [AdminController::class, 'user'])->name('admin.menu.user');
Route::get('/admin/report', [AdminController::class, 'report'])->name('admin.menu.report');
Route::get('/admin/setting', [AdminController::class, 'setting'])->name('admin.menu.setting');

// Menu dari Staff Gudang

Route::get('/staff-gudang/dashboard', [StaffGudangController::class, 'dashboard'])->name('staff.menu.dashboard');
Route::get('/staff-gudang/stock', [StaffGudangController::class, 'stock'])->name('staff.menu.stock');
Route::get('/staff-gudang/opname', [StaffGudangController::class, 'opname'])->name('staff.menu.opname');
Route::get('/staff-gudang/setting', [StaffGudangController::class, 'setting'])->name('staff.menu.setting');

// Menu dari Manajer Gudang

Route::get('/manajer-gudang/dashboard', [ManajerGudangController::class, 'dashboard'])->name('manajer.menu.dashboard');
Route::get('/manajer-gudang/product', [ManajerGudangController::class, 'product'])->name('manajer.menu.product');
Route::get('/manajer-gudang/stock', [ManajerGudangController::class, 'stock'])->name('manajer.menu.stock');
Route::get('/manajer-gudang/supplier', [ManajerGudangController::class, 'supplier'])->name('manajer.menu.supplier');
Route::get('/manajer-gudang/report', [ManajerGudangController::class, 'report'])->name('manajer.menu.report');
Route::get('/manajer-gudang/setting', [ManajerGudangController::class, 'setting'])->name('manajer.menu.setting');

// Untuk menampilkan form tambah produk
Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.menu.product.create');

// Untuk menyimpan data produk
Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');

// Tampilkan form edit
Route::get('/admin/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.menu.product.edit');

// Proses update data
Route::put('/admin/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');

Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');


Route::post('/admin/menu/product/category', [\App\Http\Controllers\CategoryController::class, 'store'])
    ->name('admin.menu.product.category.store');

Route::put('/admin/menu/product/category/{id}', [\App\Http\Controllers\CategoryController::class, 'update'])
    ->name('admin.menu.product.category.update');

Route::delete('/admin/menu/product/category/{id}', [\App\Http\Controllers\CategoryController::class, 'destroy'])
    ->name('admin.menu.product.category.destroy');

// Rute untuk menampilkan form tambah kategori
Route::get('/admin/menu/product/category/create', [\App\Http\Controllers\CategoryController::class, 'create'])
    ->name('admin.menu.product.category.create');

// Rute untuk menampilkan form edit kategori
Route::get('/admin/menu/product/category/{id}/edit', [\App\Http\Controllers\CategoryController::class, 'edit'])
    ->name('admin.menu.product.category.edit');

Route::post('admin/products/import', [ProductController::class, 'import'])->name('admin.products.import');
Route::get('admin/products/export', [ProductController::class, 'export'])->name('admin.products.export');

Route::post('/admin/products/store', [ProductController::class, 'store'])->name('admin.products.store');

Route::get('admin/products/search', [ProductController::class, 'search'])->name('admin.products.search');

