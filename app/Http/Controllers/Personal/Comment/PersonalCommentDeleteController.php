<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Comment\UpdateRequest;
use App\Models\Comment;


class PersonalCommentDeleteController extends Controller
{
        public function __invoke(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('personal.comment.index');
    }
}
