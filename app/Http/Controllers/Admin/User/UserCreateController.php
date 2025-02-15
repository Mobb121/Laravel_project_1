<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;

class UserCreateController extends Controller
{
    public function __invoke()
    {
        return view('admin.user.create');
    }
}
