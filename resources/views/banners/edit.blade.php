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
                                <input id="title" type="text" class="form-control" name="title" value="{{ $banner->title }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        <div class="form-group{{ $errors->has('subtitle') ? ' has-error' : '' }}">
                            <label for="subtitle" class="col-md-4 control-label">Subtitulo</label>

                            <div class="col-md-6">
                                <input id="subtitle" type="text" class="form-control" name="subtitle" value="{{ $banner->subtitle }}" required autofocus>

                                @if ($errors->has('subtitle'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subtitle') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                            <label for="color" class="col-md-4 control-label">Color de texto</label>

                            <div class="col-md-6">
                                <input id="color" type="text" class="form-control" name="color" value="{{ $banner->color }}" required autofocus>

                                @if ($errors->has('color'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('color') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                            <label for="color" class="col-md-4 control-label">Estado</label>
                            
                            <div class="col-md-6">
                                
                                  <select class="form-control" id="status" name="status" value="{{ old('status') }}">
                                    <option value="0">Inactivo</option>
                                    <option value="1">Activo</option>
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
@endsection
