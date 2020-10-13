<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;

class PostController extends Controller
{
    //
    public function show(Post $post){
        return view('blog.single')
            ->with('post',$post)
            ->with('tags',Tag::all())
            ->with('categories',Category::all())
            ->with('ppost',Post::orderBy('published_at', 'DESC')->limit(5)->get()) ;
    }

    public function category(Category $category){
       
        return view('blog.category')
            ->with('category',$category)
            ->with('categories',Category::all())
            ->with('tags',Tag::all())
            ->with('posts',$category->posts()->searched()->simplePaginate(9))
            ->with('ppost',Post::orderBy('published_at', 'DESC')->limit(5)->get());
    }
    public function tag(Tag $tag){
       
        return view('blog.tag')
            ->with('tag',$tag)
            ->with('categories',Category::all())
            ->with('tags',Tag::all())
            ->with('posts',$tag->posts()->searched()->simplePaginate(9))
            ->with('ppost',Post::orderBy('published_at', 'DESC')->limit(5)->get());
    }
}
