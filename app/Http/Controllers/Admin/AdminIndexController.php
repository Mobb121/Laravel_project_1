<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;

class AdminIndexController extends Controller
{
    public function __invoke()
    {
        return view('admin.main.index');
    }
}
