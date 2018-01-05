@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Nuevo taller</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('talleres.store' ) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('cover_page') ? ' has-error' : '' }}">
                            <label for="cover_page" class="col-md-4 control-label">Portada</label>

                            <div class="col-md-6">
                                <input type="file" name="cover_page" accept=".png, .jpg, .jpeg" required>


                                @if ($errors->has('cover_page'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cover_page') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label"> Nombre </label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="teachers" class="col-md-4 control-label">Profesores a Cargo</label>
                            <div class="col-md-6">
                                
                                <select class="form-control js-multiple" name="teachers[]" multiple="multiple" required>
                                
                                    @foreach($teachers as $teacher)
                                            <option value="{{$teacher->id}}">{{$teacher->name}} {{$teacher->last_name}}</option>
                                    @endforeach

                                </select>

                            </div>                            
                        </div>
                        
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label"> Cupos </label>

                            <div class="col-md-6">
                                <input id="quotas" type="number" class="form-control" name="quotas" value="{{ old('quotas') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label"> Sobre Cupos </label>

                            <div class="col-md-6">
                                <input id="about_quotas" type="number" class="form-control" name="about_quotas" value="{{ old('abou_quotas') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="col-md-offset-1 col-md-10">
                                <textarea id="content"  type="text" class="form-control" name="description" value="{{ old('description') }}" required autofocus></textarea>
                                    
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Crear
                                </button>
                            </div>
                        </div>
                    </form>                  

                </div>
            </div>
        </div>
    </div>
</div>
    
    @section('select2')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(".js-multiple").select2({
            placeholder: "Selecciona los Profesores",
            teachers: true,
        })
    </script>
    @stop
    @section('ckeditor')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script>
    $('#content').ckeditor();
    </script>
    @stop

@endsection






