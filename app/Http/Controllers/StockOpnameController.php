<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockOpnameController extends Controller
{
    public function create()
    {
        $name = auth()->user()->name;
        $email = auth()->user()->email;
        $type = 'opname'; // atau nilai yang sesuai dengan kebutuhanmu
        // Tampilkan form untuk membuat stock opname baru
        return view('admin.menu.stock_opname.create', compact('name', 'email', 'type'));
    }
}

