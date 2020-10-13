<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;

class WelcomeController extends Controller
{
    //

    public function index(){
        $tag = Tag::all();
        $category = Category::all();

        
        return view('welcome')
            ->with('posts',Post::searched()->simplePaginate(9))
            ->with('categories',$category)->with('tags',$tag)
            ->with('ppost',Post::orderBy('published_at', 'DESC')->limit(5)->get());
    }

    
}
