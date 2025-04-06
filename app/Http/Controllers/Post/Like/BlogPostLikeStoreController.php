<?php

namespace App\Http\Controllers\Post\Like;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Comment\UpdateRequest;
use App\Http\Requests\Post\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Post;


class BlogPostLikeStoreController extends Controller
{
        public function __invoke(Post $post)
    {

      auth()->user()->likedPosts()->toggle($post->id);


        return redirect()->back();
    }
}
