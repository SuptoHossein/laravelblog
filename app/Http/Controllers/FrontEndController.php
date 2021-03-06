<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function home()
    {
        $posts = Post::with('category', 'user')->orderBy('created_at', 'ASC')->take(5)->get();

        // posts splice for header
        $firstPosts = $posts->splice(0, 2);
        $middlePosts = $posts->splice(0, 1);
        $lastPosts = $posts->splice(0);

        // posts splice for footer
        $footerPosts = Post::with('category', 'user')->orderBy('created_at', 'ASC')->inRandomOrder()->limit(4)->get();
        $firstFooterPost = $footerPosts->splice(0, 1);
        $middleFooterPost = $footerPosts->splice(0, 1);
        $lastFooterPost = $footerPosts->splice(0, 2);
        // return $firstFooterPost;

        // Resent posts query here
        $recentPost = Post::with('category', 'user')->orderBy('created_at', 'DESC')->paginate(9);
        return view('website.home', compact(['posts', 'recentPost', 'firstPosts', 'middlePosts', 'lastPosts', 'firstFooterPost', 'middleFooterPost', 'lastFooterPost', 'footerPosts']));
    }

    public function about()
    {
        return view('website.about');
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();

        if ($category) {
            $posts = Post::where('category_id', $category->id)->paginate(9);

            return view('website.category', compact(['category', 'posts']));
        } else {
            return redirect()->route('website');
        }
    }

    public function contact()
    {
        return view('website.contact');
    }

    public function post($slug)
    {
        $post = Post::with('category', 'user')->where('slug', $slug)->first();
        $posts = Post::with('category', 'user')->orderBy('created_at', 'ASC')->inRandomOrder()->limit(3)->get();

        // posts splice for footer
        $relatedPosts = Post::orderBy('category_id', 'desc')->inRandomOrder()->take(4)->get();
        $firstRelatedPost = $relatedPosts->splice(0, 1);
        $middleRelatedPost = $relatedPosts->splice(0, 1);
        $lastRelatedPost = $relatedPosts->splice(0, 2);
        // return $firstFooterPost;

        $categories = Category::all();
        $tags = Tag::all();

        if($post) {
            return view('website.post', compact(['post', 'posts', 'categories', 'tags', 'firstRelatedPost', 'middleRelatedPost', 'lastRelatedPost']));
        } else {
            return redirect('/');
        }
    }

    public function tag()
    {
        return view('website.tag');
    }
}
