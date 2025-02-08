<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;

class PostDestroyController extends Controller
{
    public function __invoke(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.post.index');
    }
}
