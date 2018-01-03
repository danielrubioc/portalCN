@extends('layouts.app')

@section('content')
<div class="container">   

     @if(Auth::user())
        @if (Auth::user()->role_id == 3)

            <p>Un total de {{ $workshops->total() }} registros</p>
            @foreach ($workshops as $taller)
                    <p>{{ $taller->id }}</p>    
                    <p>{{ $taller->name }} </p>
                   
            @endforeach

            <div class="col-md-12">
                {{ $workshops->links() }}
            </div>

        @endif
    @endif

</div>
@endsection
