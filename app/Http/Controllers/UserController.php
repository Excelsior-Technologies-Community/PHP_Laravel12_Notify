<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $role = $request->role;

        $users = User::when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        })
            ->when($role, function ($query) use ($role) {
                $query->where('role', $role);
            })
            ->orderBy('id', 'asc')
            ->paginate(3)
            ->withQueryString();

        return view('users.index', compact('users', 'search', 'role'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'role' => $request->role ?? 'user',
        ]);

        notify()->success('User Created Successfully');

        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role ?? $user->role,
        ];

        // ONLY update password if user enters it
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        notify()->success('User Updated Successfully');

        return redirect()->route('users.index');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $name = $user->name;

        $user->delete();

        notify()->success($name . ' Deleted Successfully');

        return redirect()->route('users.index');
    }
}
