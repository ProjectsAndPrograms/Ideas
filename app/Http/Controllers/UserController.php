<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    
    public function show(User $user)
    {
        $ideas = $user->ideas()->paginate(5);
        return view('users.show', compact('user', 'ideas'));
    }

   
    public function edit(User $user)
    {
        $this->authorize('update', $user); // here we are passing the policy method name

        $ideas = $user->ideas()->paginate(5);
        $editing = true;
        return view('users.edit', compact('user', 'editing', 'ideas'));
    }

   
    public function update(UpdateUserRequest $request ,User $user)
    {
        $this->authorize('update', $user); // here we are passing the policy method name

        // $validated = request()->validate(
        //     [
        //         'name' => 'required|max:40',
        //         'bio' => 'nullable|min:1|max:255',
        //         'image' => 'image'
        //     ]
        // );   // If we are working on big project this will make our file so complecated, so here we can actually use another way (Request)
        $validated = $request->validated();


        if($request->has('image')){
            $imagePath = $request->file('image')->store('profile', 'public');
            $validated['image'] = $imagePath;

            Storage::disk('public')->delete($user->image ?? '');
        }

        $user->update($validated);
        return redirect()->route('profile');
    }

    public function profile(){
        return $this->show(auth()->user());        
    }
    
}
