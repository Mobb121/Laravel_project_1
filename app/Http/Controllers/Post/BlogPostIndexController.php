<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class BlogPostIndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::paginate(6);
        $randomPost = Post::get()->random(4);
        $randomPost2 = Post::get()->random(2);
        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count','DESC')->get()->take(4);
        return view('post.index1',compact('posts','randomPost','likedPosts','randomPost2'));
    }
}
