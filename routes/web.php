<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home', ['title' => 'Homepage']);
});



Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});



Route::get('/posts', function () {
    #eager loading
    // $posts = Post::with(['author', 'category'])->latest()->get();
    // debuging
    //     dump(request('search'));
    // $posts = Post::latest();
    // if (request('search'))$posts->where('title', 'like', '%' . request('search') . '%'); {

    // }

    // $posts = Post::latest()->get();
    return view('posts', ['title' => 'Blog', 'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(6)->withQueryString()]);
});

Route::get('/posts/{post:slug}', function (Post $post) {

    // $post = Post::find($slug);

    return view('post', ['title' => 'Single Post', 'post' => $post]);
});


Route::get('/authors/{user:username}', function (User $user) {

    // $post = Post::find($slug);
    #eager loading
    // $posts = $user->posts->load('category', 'author');

    return view('posts', ['title' => count($user->posts) . ' Articles By ' . $user->name, 'posts' => $user->posts]);
});

Route::get('/categories/{category:slug}', function (Category $category) {

    // $post = Post::find($slug);
    // $posts = $category->posts->load('category', 'author');

    return view('posts', ['title' => ' Category ' . $category->name, 'posts' => $category->posts]);
});



Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});
