<?php

use Illuminate\Support\Facades\Route;
use App\Models\BlogPost;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BgAuthController;
use App\Http\Controllers\AuthorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Homepage
//Route::get('/home', [BgAuthController::class, 'homepage']);
Route::get('/', [BlogPostController::class, 'welcome'])->name('home');
// Routte::get('');

// The route we have created to show all blog posts.
Route::get('/blog', [BlogPostController::class, 'index'])->middleware('auth');

// Route to show 1 particular post
Route::get('/blog/{blogPost}', [BlogPostController::class, 'show'])->name('blog.show');

// shows the create post form
// Route::get('/blog/create/post', [BlogPostController::class, 'create']);

// saves the created post to the database
// Route::post('/blog/create/post', [BlogPostController::class, 'store']);

// shows edit post form
// Route::get('/blog/{blogPost}/edit', [BlogPostController::class, 'edit']);

// commits the edited post to the database
//Route::put('blog/{blogPost}/edit', [BlogPostController::class, 'update']);

// deletes post from the database
// Route::delete('blog/{blogPost}', [BlogPostController::class, 'destroy']);

/**
 * BlogPostController Ajax
 */
Route::post('blog/add_post', [BlogPostController::class, 'ajax_store'])->name('posts.store');
Route::post('blog/edit_post', [BlogPostController::class, 'ajax_update'])->name('posts.update');
Route::post('blog/delete_post', [BlogPostController::class, 'ajax_destroy'])->name('posts.destroy');


// working on comment-sys
Route::post('comments', [CommentController::class, 'store'])->middleware('auth');
Route::post('comments/comment_edit', [CommentController::class, 'edit_comment'])->name('comments.update');
Route::post('comments/delete', [CommentController::class, 'destroy'])->name('comments.destroy');


// Route for Authentication
Route::get('login', [BgAuthController::class, 'index'])->name('login');
Route::post('custom-login', [BgAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [BgAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [BgAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [BgAuthController::class, 'signOut'])->name('signout');


/**
 * User profile management
 */
Route::get('user', [AuthorController::class, 'profile'])->name('profile')->middleware('auth');
// Route::get('user/edit/{author}', [AuthorController::class, 'editprofile'])->name('edit.profile');
// Route::post('user/update/{author}', [AuthorController::class, 'updateprofile'])->name('update.profile');
// Route::get('user/reset', [AuthorController::class, 'reset_passwd'])->name('reset.password');
Route::post('user/change_passwd/', [AuthorController::class, 'updatepasswd'])->name('update.passwd');

Route::get('user/posts/{author}', [AuthorController::class, 'author_post'])->name('author.posts');
Route::get('user/authposts/{author}', [AuthorController::class, 'auth_authorposts'])->name('auth_author.posts');

/**
 * Ajax User profile management
 */
Route::post('user/update_profile', [AuthorController::class, 'ajupdate_profile'])->name('ajprofile.update');
Route::post('user/deletepost', [AuthorController::class, 'postdestroy'])->name('mypost.delete');
