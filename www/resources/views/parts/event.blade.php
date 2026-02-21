<div class="col-lg-3 col-md-6 col-12 gy-5">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-name">{{$event->name}}</h5>
            <p class="card-text">Цена: {{$event->price}}</p>
            <p class="card-text">Дата: {{$event->date}}</p>
            <p class="card-text">Время: {{$event->time}} мин.</p>
            <a href="{{route('event.show', $event)}}" class="btn btn-primary">Перейти</a>
        </div>
    </div>
</div>
