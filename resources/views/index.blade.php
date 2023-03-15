@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Главная страница блога</h1>

        <h4>Посты:</h4>

        <ul>


            @foreach($posts as $post)
                <li>{{ $post->name }}</li>
            @endforeach


        </ul>
    </div>


@endsection
