@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Nuevo Estudiante</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('workshops.storeStudent' ) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" id="id" value="{{$workshop->id}}">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Taller</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$workshop->name}}" readonly="" autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="teachers" class="col-md-4 control-label">Alumno(s)</label>
                            <div class="col-md-6">
                                
                                <select class="form-control js-multiple form-control" name="students[]" multiple="multiple" required>
                                
                                    @foreach($students as $student)
                                            <option value="{{$student->id}}">{{$student->name}} {{$student->last_name}}</option>
                                    @endforeach

                                </select>

                            </div>                            
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Crear
                                </button>
                                <a href="{{ URL::to('workshops') }}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@section('select2')
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(".js-multiple").select2({
            placeholder: "Selecciona los Profesores",
            
        });
       
    </script>
@stop
@endsection
