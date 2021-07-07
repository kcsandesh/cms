<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{



    public function index()
    {

        // $search=request()->query('search');
        // if($search)
        // {
        //    $post= Post::where('title' , 'LIKE' ,"%{$search}%")->simplePaginate(2);
        // }
        // else{
        //     $post=Post::simplePaginate(2);
        // }


        return view('welcome')
        ->with('posts',Post::searched()->simplePaginate(2))
        ->with('categories',Category::all())
        ->with('tags',Tag::all());
    }

}
