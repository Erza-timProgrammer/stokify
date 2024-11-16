<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;
use Symfony\Component\Console\Logger\ConsoleLogger;
use App\Models\Product;
use App\Models\User;
use App\Models\Stock_Transaction;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.layout');
    }

    public function data()
    {
        $adminName = auth()->user()->name;
        $adminemail = auth()->user()->email;

        return view('admin.layout', [
            'name' => $adminName,
            'email' => $adminemail
        ]);
    }


    // menu di sidebar
    public function dashboard()
    {
        $name = auth()->user()->name;
        $email = auth()->user()->email;
        $transactions = Stock_transaction::all();
        $productCounts = [
            'Perabotan' => Product::where('category_id', 1)->count(),
            'Elektronik' => Product::where('category_id', 2)->count(),
            'Aksesoris' => Product::where('category_id', 3)->count(),
        ];
        return view('admin.menu.dashboard', compact('name', 'email', 'transactions', 'productCounts'));
    }
    public function product()
    {
        $adminName = auth()->user()->name;
        $adminemail = auth()->user()->email;
        return view('admin.menu.product', [
            'name' => $adminName,
            'email' => $adminemail
        ]);
    }
    public function stock()
    {
        $adminName = auth()->user()->name;
        $adminemail = auth()->user()->email;
        return view('admin.menu.stock', [
            'name' => $adminName,
            'email' => $adminemail
        ]);
    }
    public function supplier()
    {
        $adminName = auth()->user()->name;
        $adminemail = auth()->user()->email;
        return view('admin.menu.supplier', [
            'name' => $adminName,
            'email' => $adminemail
        ]);
    }
    public function user()
    {
        $adminName = auth()->user()->name;
        $adminemail = auth()->user()->email;
        return view('admin.menu.user', [
            'name' => $adminName,
            'email' => $adminemail
        ]);
    }
    public function report()
    {
        $adminName = auth()->user()->name;
        $adminemail = auth()->user()->email;
        return view('admin.menu.report', [
            'name' => $adminName,
            'email' => $adminemail
        ]);
    }
    public function setting()
    {
        $adminName = auth()->user()->name;
        $adminemail = auth()->user()->email;
        return view('admin.menu.setting', [
            'name' => $adminName,
            'email' => $adminemail
        ]);
    }

}