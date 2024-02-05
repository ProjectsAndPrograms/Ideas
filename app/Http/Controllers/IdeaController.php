<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateIdeaRequest;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{

    public function show(Idea $idea){
        // return view('ideas.show', [
        //     'idea' => $idea
        // ]);

        // WE CAN DO THE SAME THING BY USING compact() : it finds the variable looks like the given string and automatically create associative array for us.

        return view('ideas.show', compact('idea'));
    }

    public function store(UpdateIdeaRequest $request){
        $validated = $request->validated();

        // $idea = new Idea([
        //     'content' => request()->get('idea', '')
        // ]);
        // $idea->save();

        // THERE IS MORE SIMPLER WAY THAN THIS

        // dump(request()->all());
        // dd($validated);

        $validated['user_id'] = auth()->id();

        Idea::create($validated);

        return redirect()->route('dashboard')->with('success', 'Idea created Successfully !');
    }

    public function destroy(Idea $idea){        // this is something called model route binding

        // if(auth()->id() !== $idea->user_id){
        //     abort(404);
        // }        
        // we can do the same thing using gates
        // $this->authorize('idea.delete', $idea);
        // AND we can also do the same thing using policy
        $this->authorize('delete', $idea);

        // where id=3
        // $idea = Idea::where('id', $id)->firstOrFail();
        $user_id = $idea->user_id;
        $idea->delete();

        return redirect()->route('users.show', $user_id)->with('success', 'Idea deleted Successfully !');
    }
    
    public function edit(Idea $idea){
        // if(auth()->id() !== $idea->user_id){
        //     abort(404);
        // }
        // another way by using gates
        // $this->authorize('idea.edit', $idea);
        // AND we can also do the same thing using policy
        $this->authorize('update', $idea);
      
        $editing = true;

        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(UpdateIdeaRequest $request, Idea $idea){

        // if(auth()->id() !== $idea->user_id){
        //     abort(404);
        // }
        // another way by using gates
        // $this->authorize('idea.edit', $idea);
        // AND we can also do the same thing using policy
        $this->authorize('update', $idea);

        $validated = $request->validated();

        $idea->update($validated);

        return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea updated successfully !');
    }

   
}
