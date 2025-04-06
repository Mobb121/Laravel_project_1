<?php

use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Admin\Post\PostCreateController;
use App\Http\Controllers\Admin\Post\PostDestroyController;
use App\Http\Controllers\Admin\Post\PostEditController;
use App\Http\Controllers\Admin\Post\PostIndexController;
use App\Http\Controllers\Admin\Post\PostShowController;
use App\Http\Controllers\Admin\Post\PostStoreController;
use App\Http\Controllers\Admin\Post\PostUpdateController;
use App\Http\Controllers\Admin\Tag\TagCreateController;
use App\Http\Controllers\Admin\Tag\TagDestroyController;
use App\Http\Controllers\Admin\Tag\TagEditController;
use App\Http\Controllers\Admin\Tag\TagIndexController;
use App\Http\Controllers\Admin\Tag\TagShowController;
use App\Http\Controllers\Admin\Tag\TagStoreController;
use App\Http\Controllers\Admin\Tag\TagUpdateController;
use App\Http\Controllers\Admin\User\UserCreateController;
use App\Http\Controllers\Admin\User\UserDestroyController;
use App\Http\Controllers\Admin\User\UserEditController;
use App\Http\Controllers\Admin\User\UserIndexController;
use App\Http\Controllers\Admin\User\UserShowController;
use App\Http\Controllers\Admin\User\UserStoreController;
use App\Http\Controllers\Admin\User\UserUpdateController;
use App\Http\Controllers\Personal\Comment\PersonalCommentController;
use App\Http\Controllers\Personal\Comment\PersonalCommentDeleteController;
use App\Http\Controllers\Personal\Comment\PersonalCommentEditController;
use App\Http\Controllers\Personal\Comment\PersonalCommentUpdateController;
use App\Http\Controllers\Personal\Liked\PersonalLikedController;
use App\Http\Controllers\Personal\Liked\PersonalLikedDeleteController;
use App\Http\Controllers\Personal\Main\PersonalIndexController;
use App\Http\Controllers\Post\BlogPostIndexController;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Post\BlogPostShowController;
use App\Http\Controllers\Post\Comment\BlogPostCommentStoreController;
use App\Http\Controllers\Post\Like\BlogPostLikeStoreController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;


Route::namespace('Main')->group(function () {
    Route::get('/', [IndexController::class, '__invoke'])->name('main.index');
});

Route::namespace('Main')->prefix('post')->group(function () {
    Route::get('/', [BlogPostIndexController::class, '__invoke'])->name('post.index');
    Route::get('/{post}', [BlogPostShowController::class, '__invoke'])->name('post.show');

    Route::namespace('app/Http/Controllers/Post/Comment')->prefix('{post}/comments')->group(function () {
        Route::post('/', [BlogPostCommentStoreController::class, '__invoke'])->name('post.comment.store');
    });

    Route::namespace('app/Http/Controllers/Post/Like')->prefix('{post}/like')->group(function () {
        Route::post('/', [BlogPostLikeStoreController::class, '__invoke'])->name('post.like.store');
    });
});
Route::namespace('app/Http/Controllers/Personal')->prefix('personal')
    ->middleware(['auth', 'verified'])->group(function () {

        Route::get('/', [PersonalIndexController::class, '__invoke'])->name('personal.main.index');

        Route::namespace('Liked')->prefix('liked')->group(function () {
            Route::get('/', [PersonalLikedController::class, '__invoke'])->name('personal.liked.index');
            Route::delete('/{post}', [PersonalLikedDeleteController::class, '__invoke'])->name('personal.liked.delete');
        });

        Route::namespace('comment')->prefix('comment')->group(function () {
            Route::get('/', [PersonalCommentController::class, '__invoke'])->name('personal.comment.index');
            Route::get('/{comment}/edit', [PersonalCommentEditController::class, '__invoke'])->name('personal.comment.edit');
            Route::patch('/{comment}', [PersonalCommentUpdateController::class, '__invoke'])->name('personal.comment.update');
            Route::delete('/{comment}', [PersonalCommentDeleteController::class, '__invoke'])->name('personal.comment.delete');
        });
    });

Route::namespace('app/Http/Controllers/Admin')->prefix('admin')
    ->middleware(['auth', 'verified', 'admin'])->group(function () {

        Route::get('/', [AdminIndexController::class, '__invoke'])->name('admin.main.index');

        Route::namespace('Category')->prefix('categories')->group(function () {
            Route::get('/', [Category\CategoryIndexController::class, '__invoke'])->name('admin.category.index');
            Route::get('/create', [Category\CategoryCreateController::class, '__invoke'])->name('admin.category.create');
            Route::post('/store', [Category\CategoryStoreController::class, '__invoke'])->name('admin.category.store');
            Route::get('/{category}', [Category\CategoryShowController::class, '__invoke'])->name('admin.category.show');
            Route::get('/{category}/edit', [Category\CategoryEditController::class, '__invoke'])->name('admin.category.edit');
            Route::patch('/{category}', [Category\CategoryUpdateController::class, '__invoke'])->name('admin.category.update');
            Route::delete('/{category}', [Category\CategoryDestroyController::class, '__invoke'])->name('admin.category.delete');
        });

        Route::namespace('Tag')->prefix('tag')->group(function () {
            Route::get('/', [TagIndexController::class, '__invoke'])->name('admin.tag.index');
            Route::get('/create', [TagCreateController::class, '__invoke'])->name('admin.tag.create');
            Route::post('/store', [TagStoreController::class, '__invoke'])->name('admin.tag.store');
            Route::get('/{tag}', [TagShowController::class, '__invoke'])->name('admin.tag.show');
            Route::get('/{tag}/edit', [TagEditController::class, '__invoke'])->name('admin.tag.edit');
            Route::patch('/{tag}', [TagUpdateController::class, '__invoke'])->name('admin.tag.update');
            Route::delete('/{tag}', [TagDestroyController::class, '__invoke'])->name('admin.tag.delete');
        });

        Route::namespace('Post')->prefix('post')->group(function () {
            Route::get('/', [PostIndexController::class, '__invoke'])->name('admin.post.index');
            Route::get('/create', [PostCreateController::class, '__invoke'])->name('admin.post.create');
            Route::post('/store', [PostStoreController::class, '__invoke'])->name('admin.post.store');
            Route::get('/{post}', [PostShowController::class, '__invoke'])->name('admin.post.show');
            Route::get('/{post}/edit', [PostEditController::class, '__invoke'])->name('admin.post.edit');
            Route::patch('/{post}', [PostUpdateController::class, '__invoke'])->name('admin.post.update');
            Route::delete('/{post}', [PostDestroyController::class, '__invoke'])->name('admin.post.delete');
        });

        Route::namespace('User')->prefix('users')->group(function () {
            Route::get('/', [UserIndexController::class, '__invoke'])->name('admin.user.index');
            Route::get('/create', [UserCreateController::class, '__invoke'])->name('admin.user.create');
            Route::post('/store', [UserStoreController::class, '__invoke'])->name('admin.user.store');
            Route::get('/{user}', [UserShowController::class, '__invoke'])->name('admin.user.show');
            Route::get('/{user}/edit', [UserEditController::class, '__invoke'])->name('admin.user.edit');
            Route::patch('/{user}', [UserUpdateController::class, '__invoke'])->name('admin.user.update');
            Route::delete('/{user}', [UserDestroyController::class, '__invoke'])->name('admin.user.delete');
        });
    });

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');
