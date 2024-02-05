<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    // we can write our login here it make code/files more organized
    public function index()
    {
        // ------------------- WAY TO USE GATE IN CONTROLLER -------------------
        /*
      if(!Gate::allows('admin')){      // also you can use denies(), opposite of allows
         abort(403);
      }
      
      ++OR++

      $this->authorize('admin');  // in the authorize method you need to pass the gate name
      */

        /*
      Eager Loading : reduce queries which is executing on running website(you can define in model as well)
      with() - You can use relations to load similar models in a single query(while using this you have to make sure you have relationships defined)
      without() - it is opposite of with() function
    
      e.g.
      $ideas = Idea::with('user:id,name,image', 'comments.user:id,name,image')->orderBy('created_at', 'DESC');

      */

      // -----------------------------------------
      //   $ideas = Idea::orderBy('created_at', 'DESC');
      //   if (request()->has('search')) {
      //       $ideas = $ideas->where('content', 'like', '%' . request()->get('search', '') . '%');
      //   }

      // WE CAN DO THE SAME THING USING SCOPES AS WELL || it gives us the functionality of chaining queries
      $ideas = Idea::when(request()->has('search'), function(Builder $query){
         $query->search(request('search', ''));// search function is a local scope defined in idea model
      })->orderBy('created_at', 'DESC');

      // -----------------------------------------

        return view('dashboard', [
            // 'ideas' =>  Idea::all()         // all() is the static method of model class
            'ideas' => $ideas->paginate(5),
        ]);
    }
}
