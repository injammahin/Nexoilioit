<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'frontend.home')->name('home');
Route::view('/our-work', 'frontend.our-work')->name('our-work');
Route::view('/services', 'frontend.services')->name('services');
Route::view('/clients', 'frontend.clients')->name('clients');
Route::view('/industries', 'frontend.industries')->name('industries');
Route::view('/about', 'frontend.about')->name('about');

Route::get('/blog', function () {
    $posts = collect(config('blogs.posts', []));
    return view('frontend.blog', compact('posts'));
})->name('blog');

Route::get('/blog/{slug}', function (string $slug) {
    $posts = collect(config('blogs.posts', []));
    $post = $posts->firstWhere('slug', $slug);

    abort_unless($post, 404);

    $related = $posts
        ->where('slug', '!=', $slug)
        ->take(3)
        ->values();

    return view('frontend.blog-show', compact('post', 'related'));
})->name('blog.show');Route::view('/contact', 'frontend.contact')->name('contact');

Route::view('/privacy', 'legal.privacy')->name('privacy');
Route::view('/terms', 'legal.terms')->name('terms');
Route::view('/sitemap', 'legal.sitemap')->name('sitemap');