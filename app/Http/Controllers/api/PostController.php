<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostListResource;
use App\Models\Author;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PostController extends Controller
{
    //Вывод всех постов
//    public function index()
//    {
//        $posts = Post::all();
//        $result = [];
//
//        foreach($posts as $key => $post) {
//            $result[$key] = [
//                'name' => $post->name,
//                'title' => $post->title,
//                'description' => $post->description,
//                'views' => $post->views,
//                'author' => Author::find($post->author_id)->full_name,
//                'category' => Category::find($post->category_id)->name
//            ];
//        }
//
//        return [
//        "data" => $result
//         ];
//
//    }

    public function index()
    {
        $posts = Post::all();
        return PostListResource::collection($posts);
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
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'category_id' => 'required|integer|exist:categories,id',
            'author_id' => 'required|integer|exist:authors,id'
        ]);


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
