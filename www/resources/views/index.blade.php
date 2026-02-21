@extends('theme')
@section('content')
    <h3>Практики</h3>
    <div class="row gy-5 ">
        @foreach($events as $event)
            @include('parts.event', ['event' => $event])
        @endforeach
    </div>

    <br>

    <h3>Преподаватели</h3>
    <div class="row gy-5 ">
        @foreach($teachers as $teacher)
            @include('parts.teacher', ['teacher' => $teacher])
        @endforeach
    </div>

    <br>

    <h3>Абонементы</h3>
    <div class="row gy-5 ">
        @foreach($subscriptions as $subscription)
            @include('parts.subscription')
        @endforeach
    </div>

    <br>

    <h3>Онлайн-курсы</h3>
    <div class="row gy-5">
        @foreach($courses as $course)
            @include('parts.course')
        @endforeach
    </div>

    <br>

    <form method="post" action="{{route('application')}}" style="background: blanchedalmond; border-radius: 20px; padding: 20px">
        @csrf
        <h3>Оставить заявку</h3>
        <div class="mb-3 w-25">
            <input type="text" name="name" placeholder="Имя">
            @error('name') <p style="color: red">{{$message}}</p> @enderror
        </div>
        <div class="mb-3 w-25">
            <input type="tel" name="phone" placeholder="+7(000)-000-00-00">
            @error('phone') <p style="color: red">{{$message}}</p> @enderror
        </div>
        <div class="mb-3 w-25">
            <select name="eventId">
                <option value="">Практики</option>
                @foreach($events as $event)
                    <option value="{{$event->id}}">{{$event->name}}</option>
                @endforeach
            </select>
            @error('eventId') <p style="color: red">{{$message}}</p> @enderror
        </div>
        <div class="mb-3 w-25">
            <input type="date" name="date" placeholder="Дата">
            @error('date') <p style="color: red">{{$message}}</p> @enderror
        </div>
        <div class="mb-3 w-25">
            <select name="paymentId">
                <option value="">Способ оплаты</option>
                @foreach($payments as $payment)
                    <option value="{{$payment->id}}">{{$payment->name}}</option>
                @endforeach
            </select>
            @error('paymentId') <p style="color: red">{{$message}}</p> @enderror
        </div>
        <div class="mb-3 w-25">
            <input type="submit" value="Отправить" class="btn btn-primary">
        </div>
    </form>

    <form method="post" class="row g-3">
        @csrf
        <h2 class=" mt-5">Оставить отзыв</h2>
        <div class="mb-3">
            <textarea name="description" placeholder="Описание" class="w-25"></textarea>
        </div>
        <select class="form-select w-25">
            <option selected>Оценить</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <div class="mb-3">
        <input type="submit" value="Отправить" class="btn btn-primary">
        </div>
    </form>

    <h3>Отзывы</h3>
    @forelse($reviews as $review)
        @for($i = 1; $i <= $review->rating; $i++)
            ⭐
        @endfor
    @empty
        <p>Еще нет отзывов</p>
    @endforelse
@endsection
