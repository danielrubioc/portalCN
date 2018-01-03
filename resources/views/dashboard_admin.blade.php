@extends('layouts.app')

@section('content')
<div class="container">   

     @if(Auth::user())
        @if (Auth::user()->role_id == 1)

            vista admin
        @endif
    @endif

</div>
@endsection
