<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{

    //for posting the commen//

    public function postComment(Request $request, $article)
    {
        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->user_id = $request->input('user_id');
        $comment->article_id = $article;
        $comment->user_id = 1;
        $comment->parent_id = null; // Adjust this if you want to include parent comment functionality
        $comment->save();

        return redirect()->back()->with('success', 'Comment posted successfully.');
    }
    // for deleting the comment //
    public function delete($commentId)
    {
        $comment = Comment::findOrFail($commentId);

        // Check if the user is authorized to delete the comment
        // You can implement your own authorization logic here

        $comment->destroy($commentId);

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }

    // for updating the comment//
    public function updateComment(Request $request, Comment $comment)
    {
        $comment->content = $request->input('updated_content');
        $comment->save();

        return redirect()->back()->with('success', 'Comment updated successfully!');
    }
}
