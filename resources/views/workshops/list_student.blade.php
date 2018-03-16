@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="title-gral-index">
                @if(Auth::user())
                    @if (Auth::user()->hasRole->name == 'admin' || Auth::user()->hasRole->name == 'teacher' || Auth::user()->hasRole->name == 'attention')
                        <a href="{{ URL::to('workshops') }}" class="btn btn-success btn-create-gral">Volver a Talleres</a>
                        <a href="{{ route('workshops.registerStudent', $workshop->id) }}" class="btn btn-success btn-create-gral">Registrar estudiante</a>
                    @endif
                @endif 
                <h1>Lista de Estudiantes  - "{{$workshop->name}}" </h1>
            </div>
            <br>
            <p>Un total de {{ count($listStudents) }} inscritos(as)</p>
            <div class="panel panel-default">

                 <table class="table table-responsive table-perzonalise table-striped">
                    <thead>
                            <tr>    
                                    
                                    <td>Nombre</td>
                                    @if(Auth::user())
                                        @if (Auth::user()->hasRole->name == 'admin' || Auth::user()->hasRole->name == 'teacher' || Auth::user()->hasRole->name == 'publisher')
                                        <td>Correo</td>
                                        <td>Telefono</td>
                                        <td>Rol</td>
                                        <td>Estado</td>
                                        <td>id</td>
                                        <td></td>
                                       @endif
                                    @endif   
                            </tr>
                    </thead>
                    <tbody>
                            @foreach ($listStudents as $student)
                                <tr>
                                    <td>{{ $student->name }} {{ $student->last_name }}</td>
                                    @if(Auth::user())
                                        @if (Auth::user()->hasRole->name == 'admin' || Auth::user()->hasRole->name == 'teacher' || Auth::user()->hasRole->name == 'publisher')
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->cell_phone }}</td>
                                            <td>{{ $student->hasRole->name }}</td>
                                            <td>{{ $student->hasStatus->name }}</td>
                                            <td>{{ $student->id }}</td>    
                                            <td class="box-btnes">
                                                <form method="POST" action="{{ route('workshops.destroyStudent', ['id' => $student->id] ) }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <input type="hidden" name="workshop_id" value="{{$workshop->id}}">
                                                    <button type="submit" class="btn btn-danger delete-user" value="Delete user" onclick="return confirm('Estás seguro?')" data-toggle="tooltip" title="Eliminar"> Eliminar del curso </button>
                                                </form>
            
                                            </td>
                                        @endif
                                    @endif    
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>    
@endsection
