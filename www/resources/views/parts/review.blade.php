@forelse($reviews as $review)
    <div class="col-lg-3 col-md-6 col-12 gy-5">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                @for($i = 1; $i <= $review->rating; $i++)
                    ⭐
                @endfor
                <h5 class="card-name">{{$review->user->name}} | {{$review->created_at}}</h5>
                <p class="card-text">{{$review->description}}</p>
            </div>
        </div>
    </div>
@empty
    <p>Еще нет отзывов</p>
@endforelse

