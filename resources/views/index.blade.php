@extends('layouts.main')

@section('content')
    <h1>Главная страница блога</h1>

    <h4>Посты:</h4>

    <ul>


        @foreach($posts as $post)
            <li>{{ $post->name }}</li>
        @endforeach


    </ul>

@endsection
