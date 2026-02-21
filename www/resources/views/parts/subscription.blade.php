<div class="col-lg-3 col-md-6 col-12 gy-5">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-name">{{$subscription->name}}</h5>
            <p class="card-text">Количество занятий: {{$subscription->count_classes}}</p>
            <p class="card-text">Цена: {{$subscription->price}} руб.</p>
            <a href="{{route('subscription.show', $subscription)}}" class="btn btn-primary">Перейти</a>
        </div>
    </div>
</div>
