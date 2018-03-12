<div class="cell">
    <div class="card">
        <div class="card-divider">
            {{$user->slug}}
        </div>
        <img src="{{$user->avatar}}">
        <div class="card-section">
            <h4>{{$user->name}}</h4>
            <p>{{$user->email}}</p>
        </div>
    </div>
</div>