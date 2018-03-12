@extends('layouts.app')

@section('content')
    @include('chusqers.chusqer')
    @foreach($chusqer->like->chunk(3) as $row)
        <div class="row small-up-1 medium-up-2 large-up-3">

        @foreach($row as $user)
            @include('users.partials.base', ['user' => $user])
        @endforeach
        </div>
    @endforeach
@endsection