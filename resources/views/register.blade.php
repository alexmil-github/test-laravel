@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Регистрация</h1>

        <form method="post" action="{{ route('register') }}" class="form-style-10">
            @csrf

            <div class="section"><span>1</span>Name</div>
            <div class="inner-wrap">
                <input type="text" name="name" value="{{ old('name') }}" >
                @error('name')
                <small>{{$message}}</small>
                @enderror
            </div>

            <div class="section"><span>2</span>Email</div>
            <div class="inner-wrap">
                <input type="text" name="email" value="{{ old('email') }}" >
                @error('email')
                <small>{{$message}}</small>
                @enderror
            </div>
            <div class="section"><span>3</span>Password</div>
            <div class="inner-wrap">

                <label>Password<input type="password" name="password" value="{{ old('password') }}"></label>
                @error('password')
                <small>{{$message}}</small>
                @enderror
                <label>Password confirmation<input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}"></label>
                @error('password_confirmation')
                <small>{{$message}}</small>
                @enderror
            </div>

            <input type="submit" value="Регистрация"/>

        </form>
    </div>

@endsection
