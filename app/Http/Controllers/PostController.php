<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //Вывод всех постов
    public function index()
    {
//        $posts = Post::all();
        return Post::all();
    }

//    public function show($id)
//    {
//        $post = Post::find($id);
//        return $post;
//    }

//Вывод одного поста
    public function show(Post $post)
    {
        return $post;
    }

    //Создание поста
    public function store(Request $request)
    {

        return Post::create($request->all());
    }

    //Редактирование поста
    public function update(Post $post, Request $request)
    {
        $post->update($request->all());
        $post->save();

        return $post;
    }

    //Удаление поста

    public function destroy($id)
    {

        $post = Post::find($id);

        $post->delete();

        return [
          "deleted" => true
        ];
    }

    //Вывод всех постов определенного автора

    public function posts(Author $author)
    {
        return $author->posts;
    }

    public function author(Post $post)
    {
        $author = $post->author;
        return $author->full_name;
    }

}
