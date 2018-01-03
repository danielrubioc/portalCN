@extends('layouts.app')

@section('content')
<div class="container">
   


     @if(Auth::user())
        @if (Auth::user()->role_id == 1)
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('users') }}">Usuarios</a></li>
                <li><a href="{{ URL::to('categories') }}">Categorías blog</a></li>
                <li><a href="{{ URL::to('posts') }}">Blog</a></li>
                <li><a href="{{ URL::to('tags') }}">Tags</a></li>
                <li><a href="{{ URL::to('talleres') }}">Talleres</a></li>
            </ul>
        @endif
        @if (Auth::user()->role_id == 2)
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('category') }}">Categorías blog</a></li>
                <li><a href="{{ URL::to('post') }}">Blog</a></li>
            </ul>

        @endif
    @endif

</div>
@endsection
