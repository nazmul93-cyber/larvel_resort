<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->toBase()
            ->select('id', 'name', 'email')
            ->get();

        return view('users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store()
    {
        $formFields = request()->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6'],

        ]);

        // hash password 
        $formFields['password'] = bcrypt($formFields['password']);

        // create user
        $user = User::create($formFields);

        // login as new user
        auth()->login($user);

        return redirect('/')->with('message', 'User created and Logged In');
    }

    public function edit(User $admin)
    {

        return view('users.edit', ['admin' => $admin]);
    }

    public function update(User $admin)
    {
        // admin authorization 
        if (auth()->id() == $admin->id) {

            $formFields = request()->validate([
                'name' => ['required', 'min:3'],
                'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($admin->id)],
                'password' => ['required', 'confirmed', 'min:6'],

            ]);

            // hash password 
            $formFields['password'] = bcrypt($formFields['password']);

            // update user
            $admin->update($formFields);
            return back()->with('message', 'Admin information updated successfully');
        } else {
            abort(403, 'Unauthorized Action');
        }
    }

    public function destroy(User $admin)
    {
        // authorization not used intentionally
        $admin->delete();
        return redirect('/admins')->with('message', "Admin info deleted successfully");
    }

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been Logged Out');
    }

    public function login()
    {
        return view('users.login');
    }

    public function authenticate()
    {
        $formFields = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:3'],
        ]);

        if (auth()->attempt($formFields)) {
            request()->session()->regenerate();
            return redirect('/')->with('message', 'Logged In as Admin');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function adminPanel()
    {
        return view('users.admin_panel');
    }
}
