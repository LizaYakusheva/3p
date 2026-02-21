@extends('theme')
@section('content')
    <form method="post" action="{{route('register')}}">
        @csrf
        <div class="mb-3">
            <input type="text" name="name" placeholder="Имя">
            @error('name') <p>{{$message}}</p> @enderror
        </div>
        <div class="mb-3">
            <input type="tel" name="phone" placeholder="+7(000)-000-00-00">
            @error('phone') <p>{{$message}}</p> @enderror
        </div>
        <div class="mb-3">
            <input type="email" name="email" placeholder="Email">
            @error('email') <p>{{$message}}</p> @enderror
        </div>
        <div class="mb-3">
            <input type="password" name="password" placeholder="Пароль">
            @error('password') <p>{{$message}}</p> @enderror
        </div>
        <div class="mb-3">
            <input type="password" name="password_confirmation" placeholder="Подтверждение пароля">
            @error('password2') <p>{{$message}}</p> @enderror
        </div>
        <div class="mb-3">
            <input type="submit" value="Зарегестрироваться" class="btn btn-primary">
        </div>
    </form>
@endsection
