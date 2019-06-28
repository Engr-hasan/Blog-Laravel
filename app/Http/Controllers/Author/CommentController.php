<?php

namespace App\Http\Controllers\Author;

use App\Comment;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(){
        $authorPost = Auth::user()->posts;
        return view('author.comments',compact('authorPost'));
    }
    public function destroy($id){
        $comment = Comment::findOrFail($id);
        if ($comment->post->user->id == Auth::id()){
            $comment->delete();
            Toastr::success('Comment Delete Successfully','Success');
        }else{
            Toastr::error('You are not authorized to delete this Comment.','Error');
        }
        return redirect()->back();
    }
}
