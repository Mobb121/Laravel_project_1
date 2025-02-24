<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class AdminIndexController extends Controller
{
        public function __invoke()
    {
        $data = [];
        $data['usersCount'] = User::all()->count();
        $data['categoryCount'] = Category::all()->count();
        $data['tagCount'] = Tag::all()->count();
        $data['postCount'] = Post::all()->count();
        return view('admin.main.index', compact('data'));
    }
}
