@extends('layouts.app')

@section('content')
<div class="container">   

     @if(Auth::user())
        @if (Auth::user()->role_id == 2)
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('category') }}">Categorías blog</a></li>
                <li><a href="{{ URL::to('post') }}">Blog</a></li>
            </ul>
                profeee
            {{ $workshops }}


        @endif
    @endif

</div>
@endsection
