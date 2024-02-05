<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CreateCommentRequest $request, Idea $idea)
    {
        $request->validated();
        $comment = new Comment();
        $comment->idea_id = $idea->id;
        $comment->user_id = auth()->id();
        $comment->content = request()->comment;
        $comment->save();

        return redirect()
            ->route('ideas.show', $idea->id)
            ->with('success', 'Comment posted successfully !');
    }

    public function destroy($id){

        $id = (int) $id;
        $record = Comment::select('idea_id')->where("id", "=", $id)->get()->first();
        Comment::destroy($id);
        return redirect()->route('ideas.show', $record->idea_id);
    }

}
