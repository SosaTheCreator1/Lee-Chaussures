<?php

namespace App\Http\Controllers;

use App\Models\Producto;

class ShopController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('shop', compact('productos'));
    }

    public function add()
    {
        $productos = Producto::all();
        return view('shopAdd', compact('productos'));
    }

    public function showForm()
    {
        $productos = Producto::all();
        return view('shopAdd', compact('productos'));
    }

}
