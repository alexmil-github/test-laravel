@extends('layouts.main')

@section('content')

    <div class="container">

        <h1>Редактирование поста</h1>

        <form class="form-style-10" action="/post/{{$post->id}}" method="POST">
            @method('PATCH')
            @csrf

            <div class="section"><span>1</span>Name</div>
            <div class="inner-wrap">
                <label>Posts name<input type="text" name="name" value="{{$post->name}}"/></label>
                @error('name')
                <small>{{$message}}</small>
                @enderror
            </div>

            <div class="section"><span>2</span>Title</div>
            <div class="inner-wrap">
                <label>Title <input type="text" name="title" value="{{$post->title}}"/></label>
                @error('title')
                <small>{{$message}}</small>
                @enderror
            </div>

            <div class="section"><span>3</span>Description</div>
            <div class="inner-wrap">
                <label>Description <textarea name="description" >{{$post->description}}</textarea></label>
                @error('description')
                <small>{{$message}}</small>
                @enderror
            </div>

            <div class="section"><span>4</span>Category</div>
            <div class="inner-wrap">
                <label>Category
                    <select name="category_id" id="category_id">
                        @foreach(\App\Models\Category::all() as $category)
                            <option value="{{$category->id}}" @selected($category->id == $post->category_id)>{{$category->name}}</option>
                        @endforeach
                    </select>
                </label>
            </div>

            <div class="button-section">
                <input type="submit" name="Sign Up"/>
            </div>
        </form>
    </div>

@endsection
