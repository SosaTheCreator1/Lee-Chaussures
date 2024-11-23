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

        return view('tablesEdit', compact('usuario')); // Cambia esto para que apunte a la vista de edición
    }

    public function update(Request $request, $id)
    {
        // Validación de los datos
        $request->validate([
            'name' => 'required|string|max:30',
            'lastName' => 'required|string|max:30',
            // Añade más validaciones según tus necesidades
        ]);

        // Actualizar el usuario usando el procedimiento almacenado
        DB::statement('CALL sp_up_cli_yair(?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            $id,  // El id debe ser el primer parámetro
            $request->input('name'),
            $request->input('lastName'),
            $request->input('password'),  // Asegúrate de manejar la contraseña adecuadamente
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
        // Llamar al procedimiento almacenado para eliminar el usuario
        DB::statement('CALL sp_del_cli_yair(?)', [$id]);

        // Redirigir a la vista principal con un mensaje de éxito
        return redirect()->route('tables')->with('success', 'Usuario eliminado con éxito.');
    }

    public function show($id)
    {
        // Llamar al procedimiento almacenado para obtener la información del usuario
        $usuario = DB::select('CALL sp_get_cli_yair()');
        $usuario = collect($usuario)->firstWhere('id', $id);

        if (!$usuario) {
            return redirect()->route('tables')->withErrors('El usuario no existe.');
        }
        // Retornar la vista show.blade.php con los datos del usuario
        return view('tablesShow', compact('usuario'));
    }
}
