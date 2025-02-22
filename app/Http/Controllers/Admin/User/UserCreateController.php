<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserCreateController extends Controller
{
    public function __invoke(User $users)
    {
        $roles = User::getRoles();
        return view('admin.user.create', compact('roles'));
    }
}
