<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        $comments = Comment::with('product')->get();
        return view("dashboard.comment.index", compact("comments"));
    }

     public function destroy($id)
    {
        Comment::destroy($id);
        return back();
    }
}
