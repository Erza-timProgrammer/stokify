<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManajerGudangController extends Controller
{
    public function index()
    {
        return view('manajer.layout');
    }

    public function data()
    {
        $manajerName = auth()->user()->name;
        $manajerRole = auth()->user()->role;

        return view('manajer.layout', [
            'name' => $manajerName,
            'role' => $manajerRole
        ]);
    }
    public function dashboard()
    {
        $manajerName = auth()->user()->name;
        $manajerRole = auth()->user()->role;
        return view('manajer.menu.dashboard', [
            'name' => $manajerName,
            'role' => $manajerRole
        ]);
    }
    public function attributes()
    {
        $manajerName = auth()->user()->name;
        $manajerRole = auth()->user()->role;
        return view('manajer.menu.attributes', [
            'name' => $manajerName,
            'role' => $manajerRole
        ]);
    }
    public function categories()
    {
        $manajerName = auth()->user()->name;
        $manajerRole = auth()->user()->role;
        return view('manajer.menu.categories', [
            'name' => $manajerName,
            'role' => $manajerRole
        ]);
    }
    public function dataproduct()
    {
        $manajerName = auth()->user()->name;
        $manajerRole = auth()->user()->role;
        return view('manajer.menu.data', [
            'name' => $manajerName,
            'role' => $manajerRole
        ]);
    }
    public function imporexpor()
    {
        $manajerName = auth()->user()->name;
        $manajerRole = auth()->user()->role;
        return view('manajer.menu.imporexpor', [
            'name' => $manajerName,
            'role' => $manajerRole
        ]);
    }
    public function opname()
    {
        $manajerName = auth()->user()->name;
        $manajerRole = auth()->user()->role;
        return view('manajer.menu.opname', [
            'name' => $manajerName,
            'role' => $manajerRole
        ]);
    }
    public function report()
    {
        $manajerName = auth()->user()->name;
        $manajerRole = auth()->user()->role;
        return view('manajer.menu.report', [
            'name' => $manajerName,
            'role' => $manajerRole
        ]);
    }
    public function supplier()
    {
        $manajerName = auth()->user()->name;
        $manajerRole = auth()->user()->role;
        return view('manajer.menu.supplier', [
            'name' => $manajerName,
            'role' => $manajerRole
        ]);
    }
    public function setting()
    {
        $manajerName = auth()->user()->name;
        $manajerRole = auth()->user()->role;
        return view('manajer.menu.dashboard', [
            'name' => $manajerName,
            'role' => $manajerRole
        ]);
    }
    public function transaction()
    {
        $manajerName = auth()->user()->name;
        $manajerRole = auth()->user()->role;
        return view('manajer.menu.transaction', [
            'name' => $manajerName,
            'role' => $manajerRole
        ]);
    }
}
