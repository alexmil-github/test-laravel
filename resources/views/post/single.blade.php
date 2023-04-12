@extends('layouts.main')

@section('content')
    <div class="container">

        id: {{$post->id}}
        <br>
        Заголовок поста: {{$post->title}}
        <br>
        Текст поста: {{$post->description}}
        <br>
        Количество просмотров: {{$post->views}}
        <br>



    </div>


@endsection

