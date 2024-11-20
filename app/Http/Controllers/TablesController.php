<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TablesController extends Controller
{
    public function index()
    {
        // Filtrar empleados y administradores
        $employeesAndAdmins = User::whereIn('userType', ['Trabajador', 'Administrador'])
            ->select('id', 'name', 'lastName', 'phone', 'email', 'status', 'created_at')
            ->get();
        // Filtrar clientes
        $clients = User::where('userType', 'cliente')
            ->select('id', 'name', 'lastName', 'phone', 'email', 'status', 'created_at')
            ->get();

        // Pasar ambas colecciones a la vista
        return view('tables', compact('employeesAndAdmins', 'clients'));
    }
}
