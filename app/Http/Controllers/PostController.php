<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){

        $posts=Post::get();

        return view('welcome', ['posts'=>$posts]);

    }
    public function detailPost(Post $post){
        //route model binding

        return view('detail', ['post'=>$post]);
    }
}
