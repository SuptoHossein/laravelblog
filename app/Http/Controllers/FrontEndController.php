<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function home()
    {
        $post = Post::orderBy('created_at', 'DESC')->take(5)->get();
        $recentPost = Post::with('category', 'user')->orderBy('created_at', 'DESC')->paginate(9);
        return view('website.home', compact(['post', 'recentPost']));
    }
    public function about()
    {
        return view('website.about');
    }
    public function category()
    {
        return view('website.category');
    }
    public function contact()
    {
        return view('website.contact');
    }
    public function post($slug)
    {
        $post = Post::with('category', 'user')->where('slug', $slug)->first();

        if($post) {
            return view('website.post', compact('post'));
        } else {
            return redirect('/');
        }
    }
    public function tag()
    {
        return view('website.tag');
    }
}
