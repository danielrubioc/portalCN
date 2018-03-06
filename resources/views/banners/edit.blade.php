@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editando Banner</div>

                <div class="panel-body">
                   
                     <form class="form-horizontal" method="POST" action="{{ route('banners.update', ['id' => $banner->id] ) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            
                            <?php if ($banner->image): ?>
                                <img src="{{url('/uploads/banners')}}/{{ $banner->image }}" style="width:100%; max-height:150px ">
                            <?php endif ?>
                             <br>  <br>   
                            <label for="image" class="col-md-4 control-label">Imagen</label>

                            <div class="col-md-6">
                                <input name="image" id="filesToUpload" type="file"  accept=".png, .jpg, .jpeg"/>

                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Título</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ $banner->title }}" autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                            <label for="color" class="col-md-4 control-label">Color de titulo</label>

                            <div class="col-md-6">
                                <div id="colorbx" class="input-group colorpicker-component" title="selecciona el color">
                                  <input id="color" type="text" class="form-control input-lg" value="{{ $banner->color }}" name="color" value="{{ old('color') }}" required autofocus/>
                                  <span class="input-group-addon"><i></i></span>
                                </div>

                                @if ($errors->has('color'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('color') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                         <div class="form-group{{ $errors->has('subtitle') ? ' has-error' : '' }}">
                            <label for="subtitle" class="col-md-4 control-label">Subtitulo</label>

                            <div class="col-md-6">
                                <input id="subtitle" type="text" class="form-control" name="subtitle" value="{{ $banner->subtitle }}" autofocus>

                                @if ($errors->has('subtitle'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subtitle') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('subcolor') ? ' has-error' : '' }}">
                            <label for="subcolor" class="col-md-4 control-label">Color de subtitulo</label>

                            <div class="col-md-6">
                                <div id="colorbxsub" class="input-group colorpicker-component" title="selecciona el color">
                                  <input id="subcolor" type="text" class="form-control input-lg" value="{{ $banner->subcolor }}" name="subcolor" required autofocus/>
                                  <span class="input-group-addon"><i></i></span>
                                </div>
                                
                                @if ($errors->has('subcolor'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subcolor') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       
                        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                            <label for="url" class="col-md-4 control-label">link de destino</label>

                            <div class="col-md-6">
                                <input id="url" type="text" class="form-control" name="url" value="{{ $banner->url }}" autofocus>

                                @if ($errors->has('url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                            <label for="color" class="col-md-4 control-label">Estado</label>
                            
                            <div class="col-md-6">
                                <select class="form-control" id="status" name="status">
                                    @foreach($statuses as $status)
                                        @if ($banner->status  == $status['id'])
                                            <option value="{{$status['id']}}" selected>{{ $status['name'] }}</option>

                                            @else
                                            <option value="{{$status['id']}}">{{$status['name']}}</option>
                                        @endif
                                            
                                    @endforeach
                                </select>
                                

                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Actualizar
                                </button>
                                <a href="{{ URL::to('banners') }}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@section('select2')
    <link href="{{ asset('css/bootstrap-colorpicker.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap-colorpicker.min.js') }}"></script>
    <script>
      $(function () {
        $('#colorbx, #colorbxsub').colorpicker({
          autoInputFallback: false
        });
      });
       
    </script>
@stop
@endsection
