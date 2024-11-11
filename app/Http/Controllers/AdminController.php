<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;
use Symfony\Component\Console\Logger\ConsoleLogger;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.layout');
    }

    public function data()
    {
        $adminName = auth()->user()->name;
        $adminRole = auth()->user()->role;

        return view('admin.layout', [
            'name' => $adminName,
            'role' => $adminRole
        ]);
    }


    // menu di sidebar
    public function dashboard()
    {
        $adminName = auth()->user()->name;
        $adminRole = auth()->user()->role;
        return view('admin.menu.dashboard', [
            'name' => $adminName,
            'role' => $adminRole
        ]);
    }
    public function product()
    {
        $adminName = auth()->user()->name;
        $adminRole = auth()->user()->role;
        return view('admin.menu.product', [
            'name' => $adminName,
            'role' => $adminRole
        ]);
    }
    public function stock()
    {
        $adminName = auth()->user()->name;
        $adminRole = auth()->user()->role;
        return view('admin.menu.stock', [
            'name' => $adminName,
            'role' => $adminRole
        ]);
    }
    public function supplier()
    {
        $adminName = auth()->user()->name;
        $adminRole = auth()->user()->role;
        return view('admin.menu.supplier', [
            'name' => $adminName,
            'role' => $adminRole
        ]);
    }
    public function user()
    {
        $adminName = auth()->user()->name;
        $adminRole = auth()->user()->role;
        return view('admin.menu.user', [
            'name' => $adminName,
            'role' => $adminRole
        ]);
    }
    public function report()
    {
        $adminName = auth()->user()->name;
        $adminRole = auth()->user()->role;
        return view('admin.menu.report', [
            'name' => $adminName,
            'role' => $adminRole
        ]);
    }
    public function setting()
    {
        $adminName = auth()->user()->name;
        $adminRole = auth()->user()->role;
        return view('admin.menu.setting', [
            'name' => $adminName,
            'role' => $adminRole
        ]);
    }

}