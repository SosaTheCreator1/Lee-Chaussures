<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TablesController extends Controller
{
    private function obtenerUsuarios()
    {
        $employeesAndAdmins = User::whereIn('userType', ['Trabajador', 'Administrador'])
            ->select('id', 'name', 'lastName', 'phone', 'email', 'status', 'created_at')
            ->get();

        $clients = User::where('userType', 'cliente')
            ->select('id', 'name', 'lastName', 'phone', 'email', 'status', 'created_at')
            ->get();

        return compact('employeesAndAdmins', 'clients');
    }

    public function index()
    {
        $employeesAndAdmins = User::where('userType', 'Administrador')->orWhere('userType', 'Trabajador')->get();
        $clients = User::where('userType', 'Cliente')->get();

        return view('tables', compact('employeesAndAdmins', 'clients'));
    }


    public function editar($id)
    {
        $usuario = DB::select('CALL sp_get_cli_yair()');
        $usuario = collect($usuario)->firstWhere('id', $id);

        if (!$usuario) {
            return redirect()->back()->withErrors('El usuario no existe.');
        }

        return view('tablesEdit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'lastName' => 'required|string|max:30',
        ]);

        DB::statement('CALL sp_up_cli_yair(?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            $id,  // El id debe ser el primer parámetro
            $request->input('name'),
            $request->input('lastName'),
            $request->input('password'),
            $request->input('email'),
            $request->input('phone'),
            $request->input('location'),
            $request->input('about_me'),
            $request->input('status'),
        ]);
        return redirect()->route('tables')->with('success', 'Usuario actualizado con éxito.');
    }

    public function destroy($id)
    {
        DB::statement('CALL sp_del_cli_yair(?)', [$id]);
        return redirect()->route('tables')->with('success', 'Usuario eliminado con éxito.');
    }

    public function show($id)
    {
        $usuario = DB::select('CALL sp_get_cli_yair()');
        $usuario = collect($usuario)->firstWhere('id', $id);

        if (!$usuario) {
            return redirect()->route('tables')->withErrors('El usuario no existe.');
        }
        return view('tablesShow', compact('usuario'));
    }

    public function create()
    {
        return view('tablesNewUser');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'lastName' => 'required|string|max:30',
            'email' => 'required|email|max:50',
            'password' => 'required|string|min:6',
            'phone' => 'nullable|string|max:20',
            'location' => 'nullable|string|max:100',
            'about_me' => 'nullable|string|max:255',
            'status' => 'required|string|max:50',
            'userType' => 'required|string|in:Cliente,Administrador,Trabajador',
        ]);

        // Llamada al procedimiento almacenado para insertar
        DB::select('CALL sp_ins_cli_yair(?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            $request->name,
            $request->lastName,
            bcrypt($request->password),
            $request->email,
            $request->phone,
            $request->location,
            $request->about_me,
            $request->status,
            $request->userType,  // Aquí se pasa el valor de userType
        ]);

        return redirect()->route('tables')->with('success', 'Usuario creado correctamente');
    }
}
