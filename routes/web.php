<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Rolcontroller;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\userController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\GuestRegisterController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [FrontendController::class, 'welcome'])->name('index');
Route::get('/category/post/{category_id}', [FrontendController::class, 'category_post'])->name('category.post');
Route::get('/author/post/{author_id}', [FrontendController::class, 'author_post'])->name('author.post');
Route::get('/author/list', [FrontendController::class, 'author_list'])->name('author.list');
Route::get('/post/details/{slug}', [FrontendController::class, 'post_details'])->name('post.details');
Route::get('/search', [FrontendController::class, 'search'])->name('search');
Route::get('/category/allpost', [FrontendController::class, 'category_allpost'])->name('category.allpost');
Route::get('/contract', [FrontendController::class, 'contract'])->name('contract');
Route::post('/info', [FrontendController::class,'info'])->name('info');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/notify', [HomeController::class, 'notify'])->name('notify');

// Admin
Route::get('/visitor/list', [HomeController::class, 'visitor_list'])->name('visitor.list');
Route::get('/visitor/delete/{id}', [HomeController::class, 'visitor_delete'])->name('visitor.delete');
Route::get('/all/post', [HomeController::class, 'all_post'])->name('all.post');
Route::get('/all/post/view/{post_id}', [HomeController::class, 'all_post_view'])->name('all.post.view');
Route::get('/all/post/delete/{post_id}', [HomeController::class, 'all_post_delete'])->name('all.post.delete');
Route::get('/all/post/trash', [HomeController::class, 'post_trash'])->name('post.trash');
Route::get('/all/restore/{id}', [HomeController::class, 'all_restore'])->name('all.restore');
Route::get('/all/delete/hard/{id}', [HomeController::class, 'all_hard_delete'])->name('all.delete.hard');
Route::get('/comment/list', [HomeController::class, 'comment_list'])->name('comment.list');
Route::get('/user/delete/{comment_id}', [HomeController::class, 'comment_delete'])->name('comment.delete');
Route::post('/comment/check/delete', [HomeController::class, 'comment_check'])->name('comment.check');
Route::get('/comment/view/{id}', [HomeController::class, 'comment_view'])->name('comment.view');



Route::post('/all/check/delete', [HomeController::class, 'all_delete_check'])->name('all.delete.check');
Route::post('/visitor/check/delete', [HomeController::class, 'visitor_delete_check'])->name('visitor.delete.check');
Route::get('/visitor/trash', [HomeController::class, 'visitor_trash'])->name('visitor.trash');
Route::get('visitor/restore/{user_id}', [HomeController::class, 'visitor_restore'])->name('visitor.restore');
Route::get('/visitor/delete/hard/{user_id}', [HomeController::class, 'visitor_hard_delete'])->name('visitor.delete.hard');


// Users
Route::get('/users', [userController::class, 'users'])->name('user');
Route::get('/users/delete/{id}', [userController::class, 'users_delete'])->name('delete');
Route::get('/edit/profile', [userController::class, 'profile_edit'])->name('profile.edit');
Route::post('/profile/update', [userController::class, 'profile_update'])->name('profile.update');
Route::post('/photo/update', [userController::class, 'photo_update'])->name('photo.update');
Route::post('/user/check/delete', [userController::class, 'delete_check'])->name('delete.check');
Route::get('/trash', [userController::class, 'trash'])->name('trash');
Route::get('/restore/{user_id}', [userController::class, 'restore'])->name('user.restore');
Route::get('/user/delete/hard/{user_id}', [userController::class, 'hard_delete'])->name('user.delete.hard');

// Category
Route::get('/category', [CategoryController::class, 'category'])->name('category');
Route::post('/category/store', [CategoryController::class, 'category_store'])->name('category.store');
Route::get('/category/delete/{category_id}', [CategoryController::class, 'category_delete'])->name('category.del');
Route::get('/category/edit/{category_id}', [CategoryController::class, 'category_edit'])->name('category.edit');
Route::post('/category/update', [CategoryController::class, 'category_update'])->name('category.update');

//social
Route::get('/social/icon', [SocialController::class, 'social_icon'])->name('social.icon');
Route::post('/social/store', [SocialController::class, 'social_store'])->name('social.store');
Route::get('/social/store/delete/{id}', [SocialController::class, 'social_store_delete'])->name('social.store.delete');




// tags
Route::get('/tags', [TagController::class, 'tag'])->name('tag');
Route::post('/tags/store', [TagController::class, 'tag_store'])->name('tag.store');
Route::get('/tags/post/{tag_id}', [TagController::class, 'tag_post'])->name('tag.post');



// Role maneger
Route::get('/role', [Rolcontroller::class, 'role'])->name('role');
Route::post('/permission/store', [Rolcontroller::class, 'permission_store'])->name('permission.store');
Route::post('/role/store', [Rolcontroller::class, 'role_store'])->name('role.store');
Route::post('/assign/role', [Rolcontroller::class, 'assign_role'])->name('assign.role');
Route::get('/role/remove/{user_id}', [Rolcontroller::class, 'remove_role'])->name('remove.role');
Route::get('/edit/user/role/permission/{user_id}', [Rolcontroller::class, 'user_role_permission'])->name('edit.user.role.permission');
Route::post('/permission/update', [Rolcontroller::class, 'permission_update'])->name('permission.update');

// Blog Post
Route::get('/add/post', [PostController::class, 'add_post'])->name('add.post');
Route::post('/blog/post/store', [PostController::class, 'post_store'])->name('post.store');
Route::get('/my/post', [PostController::class, 'my_post'])->name('my.post');
Route::get('/post/view/{post_id}', [PostController::class, 'post_view'])->name('post.view');
Route::get('/post/delete/{post_id}', [PostController::class, 'post_delete'])->name('post.delete');
Route::get('/post/edit/{post_id}', [PostController::class, 'post_edit'])->name('post.edit');
Route::post('/post/update', [PostController::class, 'post_update'])->name('post.update');

// Guest Register
Route::get('/guest/register', [GuestRegisterController::class, 'guest_register'])->name('guest.register');
Route::get('/guest/login', [GuestRegisterController::class, 'guest_login'])->name('guest.login');
Route::post('/guest/store', [GuestRegisterController::class, 'guest_store'])->name('guest.store');
Route::post('/guest/login/request', [GuestController::class, 'guest_login_req'])->name('guest.login.req');
Route::get('/guest/logout', [GuestController::class, 'guest_logout'])->name('guest.logout');


// Comennts
Route::post('/comment/store', [GuestController::class, 'comment_store'])->name('comment.store');


// Subscriber
Route::post('/subscriber/store', [SubscriberController::class, 'subscriber_store'])->name('subscriber.store');
// Admin Subscriber
Route::get('/subscriber/list', [SubscriberController::class, 'subscriber_list'])->name('subscriber.list');
Route::get('/subscriber/delete/{id}', [SubscriberController::class, 'subscriber_del'])->name('subscriber_del');



