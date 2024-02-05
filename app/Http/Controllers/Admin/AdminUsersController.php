<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminUsersController extends Controller
{
    public function index(){

        $users = User::when(request()->has('search'), function(Builder $query){
            $searchTerm = str_replace(' ', '', request('search', ''));
            $query->where(DB::raw('CONCAT("@", REPLACE(name, " ", ""), "-", id)'), 'LIKE', '%' . $searchTerm . '%');
        })->withCount('ideas')->orderBy('ideas_count', 'DESC')->paginate(5);
        
        return view('admin.users', [
            'users' => $users,
        ]);
        

       
    }

    public function destroy($id){
        $id = (int) $id;
        if(auth()->user()->id === $id){
            abort(403);
        }
       
      User::destroy($id);

       return redirect()->route('admin.users')->with('success', 'User deleted successfully!');
    }


}
