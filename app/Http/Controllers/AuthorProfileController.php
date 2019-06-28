<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AuthorProfileController extends Controller
{
    public function profileAuthor($username){
        $author = User::where('username',$username)->first();
        $posts = $author->posts()->approved()->published()->get();
        return view('profile.author-profile',compact('author','posts'));
    }
}
