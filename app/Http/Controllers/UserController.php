<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $tables = User::all();
        // dd($tables); // Verifica que obtienes los usuarios

        return view('tables', compact('tables'));
    }


}
