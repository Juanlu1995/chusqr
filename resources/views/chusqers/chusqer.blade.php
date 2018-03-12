<div class="card @isset($user) @if($user->id == $chusqer->user_id) mine @endif @endisset">
    <div class="card-divider">
        <p>Añadido por <a href="/{{ $chusqer->user->slug }}">{{ $chusqer->user->name }}</a> - <a
                    href="{{ url('/') }}/chusqers/{{ $chusqer['id'] }}">Leer más</a></p>
    </div>
    <p class="chusqer-content">
        <img src="{{ $chusqer->image }}" alt="">{{ $chusqer->content }}
    </p>
    <p class="chusqer-hashtags text-right">
        @foreach($chusqer->hashtags as $hashtag)
            <a href="/hashtag/{{ $hashtag->slug }}"><span class="label label-primary">{{ $hashtag->slug }}</span></a>
        @endforeach
    </p>
    <form action="/chusqers/like/{{$chusqer->id}}" method="post">
        {{csrf_field()}}
        @auth()
            @if($chusqer->like->contains(Auth::user()))
                {{method_field('DELETE')}}
                <button>
                    <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDUxLjk5NyA1MS45OTciIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxLjk5NyA1MS45OTc7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iMzJweCIgaGVpZ2h0PSIzMnB4Ij4KPHBhdGggZD0iTTUxLjkxMSwxNi4yNDJDNTEuMTUyLDcuODg4LDQ1LjIzOSwxLjgyNywzNy44MzksMS44MjdjLTQuOTMsMC05LjQ0NCwyLjY1My0xMS45ODQsNi45MDUgIGMtMi41MTctNC4zMDctNi44NDYtNi45MDYtMTEuNjk3LTYuOTA2Yy03LjM5OSwwLTEzLjMxMyw2LjA2MS0xNC4wNzEsMTQuNDE1Yy0wLjA2LDAuMzY5LTAuMzA2LDIuMzExLDAuNDQyLDUuNDc4ICBjMS4wNzgsNC41NjgsMy41NjgsOC43MjMsNy4xOTksMTIuMDEzbDE4LjExNSwxNi40MzlsMTguNDI2LTE2LjQzOGMzLjYzMS0zLjI5MSw2LjEyMS03LjQ0NSw3LjE5OS0xMi4wMTQgIEM1Mi4yMTYsMTguNTUzLDUxLjk3LDE2LjYxMSw1MS45MTEsMTYuMjQyeiIgZmlsbD0iI0Q4MDAyNyIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K"/>
                </button>
            @else
                <button>
                    <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDUxLjk5NyA1MS45OTciIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxLjk5NyA1MS45OTc7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iMzJweCIgaGVpZ2h0PSIzMnB4Ij4KPGc+Cgk8cGF0aCBkPSJNNTEuOTExLDE2LjI0MkM1MS4xNTIsNy44ODgsNDUuMjM5LDEuODI3LDM3LjgzOSwxLjgyN2MtNC45MywwLTkuNDQ0LDIuNjUzLTExLjk4NCw2LjkwNSAgIGMtMi41MTctNC4zMDctNi44NDYtNi45MDYtMTEuNjk3LTYuOTA2Yy03LjM5OSwwLTEzLjMxMyw2LjA2MS0xNC4wNzEsMTQuNDE1Yy0wLjA2LDAuMzY5LTAuMzA2LDIuMzExLDAuNDQyLDUuNDc4ICAgYzEuMDc4LDQuNTY4LDMuNTY4LDguNzIzLDcuMTk5LDEyLjAxM2wxOC4xMTUsMTYuNDM5bDE4LjQyNi0xNi40MzhjMy42MzEtMy4yOTEsNi4xMjEtNy40NDUsNy4xOTktMTIuMDE0ICAgQzUyLjIxNiwxOC41NTMsNTEuOTcsMTYuNjExLDUxLjkxMSwxNi4yNDJ6IE00OS41MjEsMjEuMjYxYy0wLjk4NCw0LjE3Mi0zLjI2NSw3Ljk3My02LjU5LDEwLjk4NUwyNS44NTUsNDcuNDgxTDkuMDcyLDMyLjI1ICAgYy0zLjMzMS0zLjAxOC01LjYxMS02LjgxOC02LjU5Ni0xMC45OWMtMC43MDgtMi45OTctMC40MTctNC42OS0wLjQxNi00LjcwMWwwLjAxNS0wLjEwMUMyLjcyNSw5LjEzOSw3LjgwNiwzLjgyNiwxNC4xNTgsMy44MjYgICBjNC42ODcsMCw4LjgxMywyLjg4LDEwLjc3MSw3LjUxNWwwLjkyMSwyLjE4M2wwLjkyMS0yLjE4M2MxLjkyNy00LjU2NCw2LjI3MS03LjUxNCwxMS4wNjktNy41MTQgICBjNi4zNTEsMCwxMS40MzMsNS4zMTMsMTIuMDk2LDEyLjcyN0M0OS45MzgsMTYuNTcsNTAuMjI5LDE4LjI2NCw0OS41MjEsMjEuMjYxeiIgZmlsbD0iIzAwMDAwMCIvPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo="/>
                </button>
            @endif
        @endauth
        @guest()
            <button>
                <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDUxLjk5NyA1MS45OTciIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxLjk5NyA1MS45OTc7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iMzJweCIgaGVpZ2h0PSIzMnB4Ij4KPGc+Cgk8cGF0aCBkPSJNNTEuOTExLDE2LjI0MkM1MS4xNTIsNy44ODgsNDUuMjM5LDEuODI3LDM3LjgzOSwxLjgyN2MtNC45MywwLTkuNDQ0LDIuNjUzLTExLjk4NCw2LjkwNSAgIGMtMi41MTctNC4zMDctNi44NDYtNi45MDYtMTEuNjk3LTYuOTA2Yy03LjM5OSwwLTEzLjMxMyw2LjA2MS0xNC4wNzEsMTQuNDE1Yy0wLjA2LDAuMzY5LTAuMzA2LDIuMzExLDAuNDQyLDUuNDc4ICAgYzEuMDc4LDQuNTY4LDMuNTY4LDguNzIzLDcuMTk5LDEyLjAxM2wxOC4xMTUsMTYuNDM5bDE4LjQyNi0xNi40MzhjMy42MzEtMy4yOTEsNi4xMjEtNy40NDUsNy4xOTktMTIuMDE0ICAgQzUyLjIxNiwxOC41NTMsNTEuOTcsMTYuNjExLDUxLjkxMSwxNi4yNDJ6IE00OS41MjEsMjEuMjYxYy0wLjk4NCw0LjE3Mi0zLjI2NSw3Ljk3My02LjU5LDEwLjk4NUwyNS44NTUsNDcuNDgxTDkuMDcyLDMyLjI1ICAgYy0zLjMzMS0zLjAxOC01LjYxMS02LjgxOC02LjU5Ni0xMC45OWMtMC43MDgtMi45OTctMC40MTctNC42OS0wLjQxNi00LjcwMWwwLjAxNS0wLjEwMUMyLjcyNSw5LjEzOSw3LjgwNiwzLjgyNiwxNC4xNTgsMy44MjYgICBjNC42ODcsMCw4LjgxMywyLjg4LDEwLjc3MSw3LjUxNWwwLjkyMSwyLjE4M2wwLjkyMS0yLjE4M2MxLjkyNy00LjU2NCw2LjI3MS03LjUxNCwxMS4wNjktNy41MTQgICBjNi4zNTEsMCwxMS40MzMsNS4zMTMsMTIuMDk2LDEyLjcyN0M0OS45MzgsMTYuNTcsNTAuMjI5LDE4LjI2NCw0OS41MjEsMjEuMjYxeiIgZmlsbD0iIzAwMDAwMCIvPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo="/>
            </button>
        @endguest
        @if($chusqer->like->count() > 0)
            <a href="/chusqers/like/{{$chusqer->id}}">
                {{$chusqer->like->count()}}
            </a>
        @endif
    </form>
    @if(Auth::user() && Auth::user()->amI())
        <div class="card-section">
            @can('update', $chusqer)
                <a href="{{ Route('chusqers.edit', $chusqer) }}" class="button warning">Editar</a>
            @endcan
            @can('delete', $chusqer)
                <form action="{{ Route('chusqers.delete', $chusqer->id) }}" method="POST" id="chusqer-actions-buttons">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit" class="button alert">Borra</button>

                </form>
            @endcan
        </div>
    @endif
</div>