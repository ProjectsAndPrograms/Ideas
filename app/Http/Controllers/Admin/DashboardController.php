<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function index()
    {
        $admins = User::orderBy('created_at', 'ASC')
            ->where('is_admin', 1)
            ->get();

        return view('admin.dashboard', [
            'admins' => $admins,
        ]);
    }
    public function store()
    {
        $validated = request()->validate([
            'name' => 'required|max:40',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'is_admin' => 1,
        ]);

        Mail::to($user->email)->send(new WelcomeEmail($user));

        return redirect()
            ->route('admin.dashboard')
            ->with('success', ' Admin account created successfully !');
    }

    public function update(Request $request, $id)
    {
        if (auth()->user()->id == $id) {
            abort(403);
        }

        $record = User::find($id);
        $record->is_admin = 0;
        $record->save();

        return redirect()
            ->route('admin.dashboard')
            ->with('success', 'Admin removed Successfully!');
    }
}
