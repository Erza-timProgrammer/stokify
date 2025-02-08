<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function create($type)
    {
        $name = auth()->user()->name;
        $email = auth()->user()->email;
        $type = 'opname'; // atau nilai yang sesuai dengan kebutuhanmu
        // Tampilkan form untuk membuat stock opname baru
        return view('admin.menu.transaction.create', compact('name', 'email', 'type'));
    }
}