<div class="col-lg-3 col-md-6 col-12 gy-5">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-name">{{$teacher->name}}</h5>
            <p class="card-text">{{$teacher->status}}</p>
            <a href="{{route('teacher.show', $teacher)}}" class="btn btn-primary">Перейти</a>
        </div>
    </div>
</div>
