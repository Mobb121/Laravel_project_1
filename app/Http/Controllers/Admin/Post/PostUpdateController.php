<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class PostUpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        dd($data);
        $tagsIds = $data['tag_ids'];
        unset($data['tag_ids']);

        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        $data['main_image'] = Storage::disk('public')->put('/image', $data['main_image']);
        $post->update($data);
        $post->tags()->sync($tagsIds);
        return redirect()->route('admin.post.show', compact('post'));
    }
}

