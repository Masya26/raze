<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\postrequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role as ModelsRole;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $q = Post::with('user')->orderBy('created_at', 'DESC');


        if (
            Auth::user()->hasRole('admin')
        ) {
            $posts = $q->withTrashed()->get();
        } else {
            $posts = $q->where('user_id', Auth::id())->get();
        }
        return view('admin.post.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $categories = Category::orderBy('created_at', 'DESC')->get();
        return view('admin.post.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(postrequest $request)
    {


        auth()->user()->posts()->create($request->all());
        return redirect(('/post'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, User $user)
    {

        $categories = Category::get();


        return view('admin.post.edit', [
            'categories' => $categories,
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $post->title = $request->title;
        $post->name = $request->name;

        $post->save();

        return redirect(('/post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($postId)
    {

        Post::find($postId)->delete();

        return redirect()->back()->withSuccess('Статья была успешно удалена!');

    }
    public function revive($postId)
    {

        Post::onlyTrashed()->find($postId)->restore();
        // $user->restore();

        return redirect()->back()->withSuccess(' Пост был успешно восстановлен!');
    }
}
