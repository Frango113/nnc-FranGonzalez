<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|in:super_admin,employee'
        ]);

        // Para crear un nuevo usuario
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);
        $user->save();

        // Envío de correo electrónico
        /* Mail::to($user->email)->send(new WelcomeMail($user)); */

        return response()->json(['message' => 'User created successfully'], 201);
    }

    public function getUserById($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'user not found'], 404);
        }

        return response()->json($user);
    }

    /*   public function getAllUsers()
      {
          $users = User::all();

          return response()->json($users);
      } */
    public function getAllUsers()
    {
        $users = User::all(); // Retrieve all users from the database

        return view('UserList', ['users' => $users]);
    }
}