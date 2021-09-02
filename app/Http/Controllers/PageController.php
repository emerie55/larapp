<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index()
    {
        return 'Hello';
    }

    public function dashboard()
    {
        return view('pages.dashboard');
    }

    public function create_post()
    {
        $cat = Category::orderBy('category','ASC')->get();
        $posts = Post::orderBy('created_at', 'DESC')->get();
        return view('pages.make_post', [
            'category' => $cat,
            'posts' => $posts
        ]);
    }

    public function view_category()
    {
        $cat = Category::orderBy('category','ASC')->get();
        // $cat = DB::select("SELECT * FROM categories ORDER BY category ASC");
        return view('pages.mng_category', ['category' => $cat]);
    }

    public function view_post($id)
    {
        $post = Post::find($id);
        $otherposts = Post::where('id', '!=', $id)->orderBy('created_at', 'DESC')->paginate(1);
        return view('pages.post_details', ['post' => $post, 'otherpost' => $otherposts]);
    }
}
