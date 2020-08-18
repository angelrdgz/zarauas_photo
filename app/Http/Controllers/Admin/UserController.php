<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', ["users" => $users]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required|confirmed|min:7',
            ],
            [
                'name.required' => 'El nombre es requerido.',
                'email.required' => 'El correo es requerido.',
                'email.unique' => 'El correo ya ha sido registrado.',
                'password.required' => 'La contraseña es requerida.',
                'password.min' => 'La contraseña debe contener minimo :min caracteres.',
                'password.confirmed' => 'La contraseñas deben coincidir.',
            ]
        );


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('admin/usuarios')->with('success', 'Usuario creado correctamente.');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit',["user"=>$user]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'confirmed',
            ],
            [
                'name.required' => 'El nombre es requerido.',
                'email.required' => 'El correo es requerido.',
                'password.confirmed' => 'La contraseñas deben coincidir.',
            ]
        );

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password !== NULL) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect('admin/usuarios')->with('success', 'Usuario modificado correctamente.');
    }
}
