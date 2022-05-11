<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Notifications\Action;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\PostController;

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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::middleware(['isadmin'])->prefix('admin_panel')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('adminpanel');
    Route::get('/login/{loginAvtor}', [App\Http\Controllers\Admin\AdminController::class, 'loginAs'])->name('admin.loginAs');
    Route::delete('/user/{user}/destroy', [App\Http\Controllers\Admin\AdminController::class, 'destroy'])->name('user.destroy');
    Route::put('/user/{user}/revive', [App\Http\Controllers\Admin\AdminController::class, 'revive'])->name('user.revive');
    Route::resource('category', CategoryController::class);

});
Route::resource('post', App\Http\Controllers\Admin\PostController::class)->except(['edit', 'update','destroy']);
Route::get('/message',[App\Http\Controllers\ChatMessageController::class,'index'])->name('message');
Route::middleware(['idpost'])->group(function(){
    Route::get('/post/{post}/edit',[App\Http\Controllers\Admin\PostController::class, 'edit'])->name('post.edit');
    Route::put('/post/{post}/revive', [App\Http\Controllers\Admin\PostController::class, 'revive'])->name('post.revive');
    Route::put('/post/{post}/update', [App\Http\Controllers\Admin\PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{post}/destroy', [App\Http\Controllers\Admin\PostController::class, 'destroy'])->name('post.destroy');
});

    Route::get('/mein', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





// Route::view('post',App\Http\Controllers\Admin\PostController::class,'index');
// Route::middleware(['role:users'])->group( function () {
// });


/*

    Страница для просмотра постов одна- готово
    Маршрут для просмотра поста -готово
    Маршрут для редактирования поста (middleware для проверки принадлежности поста к юзеру) -готово
    Если пост удалён - то кнопки удаления нет, есть кнопка REVIVE

*/
