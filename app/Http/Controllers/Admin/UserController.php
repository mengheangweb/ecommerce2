<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\Welcome;
use App\Notifications\ProfileChange;
use Hash;

class UserController extends Controller
{
    public function index(Request $request){
        $keyword = $request->search;

        $query = User::where('name', 'like', '%'.$keyword.'%')->orderBy('id', 'desc');
        $users = $query->paginate(5);

        return view('admin.pages.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.pages.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->notify(new Welcome($request->email, $request->password));

        return redirect()->back();
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.pages.user.edit', compact('user'));
    }

    public function update($id)
    {
        $user = User::find($id);

        $user->notify(new ProfileChange());

        return redirect()->route('list-user');
    }
}
