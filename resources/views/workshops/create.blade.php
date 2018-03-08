@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Nuevo taller</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('workshops.store' ) }}" enctype="multipart/form-data">
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

                        <div class="form-group{{ $errors->has('subtitle') ? ' has-error' : '' }}">
                            <label for="subtitle" class="col-md-4 control-label"> Subtitulo </label>

                            <div class="col-md-6">
                                <input id="subtitle" type="text" class="form-control" name="subtitle" value="{{ old('subtitle') }}" autofocus>

                                @if ($errors->has('subtitle'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subtitle') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                            <label for="url" class="col-md-4 control-label"> Url </label>

                            <div class="col-md-6">
                                <input id="url" type="text" class="form-control" name="url" value="{{ old('url') }}" required autofocus>

                                @if ($errors->has('url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                            <label for="color" class="col-md-4 control-label">Color</label>

                            <div class="col-md-6">
                                <div id="colorbx" class="input-group colorpicker-component" title="selecciona el color">
                                  <input id="color" type="text" class="form-control input-lg" value="#6D2781" name="color" value="{{ old('color') }}" required autofocus/>
                                  <span class="input-group-addon"><i></i></span>
                                </div>

                                @if ($errors->has('color'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('color') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group{{ $errors->has('subcolor') ? ' has-error' : '' }}">
                            <label for="subcolor" class="col-md-4 control-label">SubColor</label>

                            <div class="col-md-6">
                                <div id="colorbxsub" class="input-group colorpicker-component" title="selecciona el color">
                                  <input id="subcolor" type="text" class="form-control input-lg" value="#fffff" name="subcolor" value="{{ old('subcolor') }}" required autofocus/>
                                  <span class="input-group-addon"><i></i></span>
                                </div>
                                
                                @if ($errors->has('subcolor'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subcolor') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="teachers" class="col-md-4 control-label">Profesores a Cargo</label>
                            <div class="col-md-6">
                                
                                <select class="form-control js-multiple form-control" name="teachers[]" multiple="multiple">
                                
                                    @foreach($teachers as $teacher)
                                            <option value="{{$teacher->id}}">{{$teacher->name}} {{$teacher->last_name}}</option>
                                    @endforeach

                                </select>

                            </div>                            
                        </div>
                        
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label"> Cupos </label>

                            <div class="col-md-6">
                                <input id="quotas" type="number" class="form-control" name="quotas" value="{{ old('quotas') }}" min="0" required autofocus>

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
                                <input id="about_quotas" type="number" class="form-control" name="about_quotas" min="0" value="{{ old('abou_quotas') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('place') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label"> Lugar </label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="place" value="{{ old('place') }}" required autofocus>

                                @if ($errors->has('place'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('place') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label for="type" class="col-md-4 control-label">Tipo</label>
                            <div class="col-md-6">
                                <select class="form-control" name="type">
                                    @foreach($types as $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>  
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label for="type" class="col-md-4 control-label">Estado</label>
                            <div class="col-md-6">
                                <select class="form-control" name="status">
                                    @foreach($statuses as $status)
                                        <option value="{{$status->id}}">{{$status->name}}</option>   
                                    @endforeach
                                </select>
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
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script src="{{ asset('js/bootstrap-colorpicker.min.js') }}"></script>
    <script type="text/javascript">
        $(".js-multiple").select2({
            placeholder: "Selecciona los Profesores",
            
        });
        $('#content').ckeditor();
        $(function () {
            $('#colorbx, #colorbxsub').colorpicker({
              autoInputFallback: false
            });
        });
       
    </script>
@stop

@endsection






