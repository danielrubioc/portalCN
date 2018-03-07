@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="title-gral-index">
                <a href="{{ URL::to('workshops') }}" class="btn btn-success btn-create-gral">Volver a Talleres</a>
                <a href="{{ route('workshops.registerStudent', $workshop->id) }}" class="btn btn-success btn-create-gral">Registrar estudiante</a>
                <h1>Lista de Estudiantes  - "{{$workshop->name}}" </h1>
            </div>
            <br>
            <p>Un total de {{ count($listStudents) }} registros</p>
            <div class="panel panel-default">

                 <table class="table table-responsive table-perzonalise table-striped">
                    <thead>
                            <tr>    
                                    <td>id</td>
                                    <td>Nombre</td>
                                    <td>Correo</td>
                                    <td>Telefono</td>
                                    <td>Rol</td>
                                    <td>Estado</td>
                                    <td></td>
                            </tr>
                    </thead>
                    <tbody>
                            @foreach ($listStudents as $student)
                                <tr>
                                    
                                    <td>{{ $student->id }}</td>    
                                    <td>{{ $student->name }} {{ $student->last_name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->cell_phone }}</td>
                                    <td>{{ $student->hasRole->name }}</td>
                                    <td>{{ $student->hasStatus->name }}</td>
                                    <td class="box-btnes">
                                        <form method="POST" action="{{ route('workshops.destroyStudent', ['id' => $student->id] ) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <input type="hidden" name="workshop_id" value="{{$workshop->id}}">
                                            <button type="submit" class="btn btn-danger delete-user" value="Delete user" onclick="return confirm('Are you sure?')" data-toggle="tooltip" title="Eliminar"> Eliminar del curso </button>
                                        </form>
    
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>    
@endsection
