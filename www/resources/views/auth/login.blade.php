@extends('theme')
@section('content')
    <form method="post" action="{{route('login')}}">
        @csrf
        <div class="mb-3">
            <input type="text" name="phone" placeholder="+7(000)-000-00-00">
            @error('phone')<p>{{$message}}</p>@enderror
        </div>
        <div class="mb-3">
            <input type="password" name="password" placeholder="Пароль">
            @error('password')<p>{{$message}}</p>@enderror
        </div>
        <div class="mb-3">
            <input type="submit" value="Войти" class="btn btn-primary">
        </div>
    </form>
    <a href="{{route('register')}}">Зарегистрироваться</a>
@endsection
