<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $count = User::count();
        $tabel = User::withTrashed()->get();
        $posts_count = Post::all()->count();
        $categories_count = Category::all()->count();
        $model_has_roles = Role::all();


        return view('admin.home.index', [
            'roles' => $model_has_roles,
            'posts_count' => $posts_count,
            'notCount' => $count,
            'users' => $tabel,
            'categories_count' => $categories_count,
        ]);
    }
    public function loginAs(Request $request, $loginAvtor)
    {
        Auth::loginUsingId($loginAvtor);
        return redirect(route('home'));
    }
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back()->withSuccess(' Пользователь был успешно удален!');
    }
    public function revive($id)
    {
        User::onlyTrashed()->find($id)->restore();


        return redirect()->back()->withSuccess(' Пользователь был успешно восстановлен!');
    }
}
