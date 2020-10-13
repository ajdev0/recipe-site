<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitemapController extends Controller
{
    //
    public function index(Request $r)
    {
       
        $posts = Post::orderBy('id','desc')->where('post_status', 'Publish')->get();

        return response()->view('sitemap', compact('posts'))
          ->header('Content-Type', 'text/xml');

    }
}
