<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostStoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        try{
        $data = $request->validated();
        $tagsIds = $data['tag_ids'];
        unset($data['tag_ids']);

        $data['preview_image'] = Storage::disk('public')->put('/images',$data['preview_image']);
        $data['main_image'] = Storage::disk('public')->put('/images',$data['main_image']);
        $post = Post::firstOrCreate($data);
        $post->tags()->attach($tagsIds);

        return redirect()->route('admin.post.index');
        } catch (\Exception $exception) {
            abort('404');
        }
    }
}
