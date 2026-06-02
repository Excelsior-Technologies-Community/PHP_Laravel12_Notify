<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $users = User::when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        })
            ->oldest()
            ->paginate(4);

        return view('users.index', compact('users', 'search'));
    }
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        User::create($request->all());

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
        $user->update($request->all());

        notify()->success('User Updated Successfully');

        return redirect()->route('users.index');
    }

    public function delete($id)
    {
        User::destroy($id);

        notify()->success('User Deleted Successfully');

        return redirect()->back();
    }
}