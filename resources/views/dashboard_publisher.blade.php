@extends('layouts.app')

@section('content')

    <div id="mySidenav" class="sidenav visible-xs" style="margin-left:0">
        @if(Auth::user())
        <a href="{{ url('/profile')}}" class="left-input"><img src="{{url('/uploads/avatars')}}/{{ Auth::user()->avatar }}" style="width:25px; height:25px; position:absolute; top:7px; left:10px; border-radius:50%"> <span>Mi perfil</a>
        @endif
        <a href="{{ url('/')}}" class="closebtn" onclick="closeNav()"><i class="fa fa-times" aria-hidden="true"></i></a>
        <div class="space-menu">
            <a href="{{ url('/dashboard') }}">
            @if(Auth::user())
                <h3>{{ Auth::user()->name }}</h3>
            @endif
            </a>
        </div>
        <div class="buttons">
            @if(Auth::user())
                @if (Auth::user()->hasRole->name == 'publisher')
                    <a href="{{ URL::to('categories') }}">Categorías blog <span> <i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
                    <a href="{{ URL::to('posts') }}">Blog <span> <i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
                    <a href="{{ URL::to('tags') }}">Tags <span> <i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
                    <a href="{{ URL::to('workshops') }}">Talleres <span> <i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
                    <a href="{{ URL::to('banners') }}">Banners <span> <i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>                  
                @endif
            @endif
           
        </div>
    </div>
    
@endsection
