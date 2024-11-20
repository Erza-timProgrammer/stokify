<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffGudangController;
use App\Http\Controllers\ManajerGudangController;
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