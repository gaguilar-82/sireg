<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\PasswordValidationRules;


class UserController extends Controller
{
    use PasswordValidationRules;
   
    public function __construct()
    {
        $this->middleware('can:admin.users.index');
    }
    
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    
    public function create()
    {
        return view('admin.users.create');
    }

   
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => $this->passwordRules(),
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request['password']);
        $user->save();

        return back()->with('mensaje', 'Usuario agregado');
        
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit(User $user)
    {
        $roles = Role::all();
        
        return view('admin.users.edit', compact('user', 'roles'));
    }

    
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.edit', $user)->with('info', 'Se asignarón los roles correctamente');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('info','Se eliminó el usuario correctamente');
    }
}
