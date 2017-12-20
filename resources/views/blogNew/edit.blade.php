@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editando noticia "{{ $news->title }}"</div>
                <ul class="nav nav-pills nav-gallery">
                    <li class="{{ empty($tab['name']) || $tab['name'] == 'info' ? 'active' : '' }}"><a data-toggle="pill" href="#info">Información de noticia</a></li>
                    <li class="{{ empty($tab['name']) || $tab['name'] == 'gallery' ? 'active' : '' }}"><a data-toggle="pill" href="#gallery">Galeria de imagenes</a></li>
                </ul>

                <div class="tab-content">
                    <div id="info" class="tab-pane fade {{ empty($tab['name']) || $tab['name'] == 'info' ? 'in active' : '' }}">
                            <div class="panel-body">
                                <?php if ($news->cover_page): ?>
                                        <img src="/uploads/news/{{ $news->cover_page }}" style="width:100%; max-height:150px ">
                                <?php endif ?>
                                 <br>  <br>   
                                <form class="form-horizontal" method="POST" action="{{ route('blogNew.update', ['id' => $news->id] ) }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}

                                    <div class="form-group{{ $errors->has('cover_page') ? ' has-error' : '' }}">
                                        <label for="cover_page" class="col-md-4 control-label">Portada</label>

                                        <div class="col-md-6">
                                            <input type="file" name="cover_page" >


                                            @if ($errors->has('cover_page'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('cover_page') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div> 

                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="title" class="col-md-4 control-label"> Título </label>

                                        <div class="col-md-6">
                                            <input id="title" type="text" class="form-control" name="title" value="{{ $news->title }}" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('subtitle') ? ' has-error' : '' }}">
                                        <label for="subtitle" class="col-md-4 control-label"> Subtítulo </label>

                                        <div class="col-md-6">
                                            <input id="subtitle" type="text" class="form-control" name="subtitle" value="{{ $news->subtitle  }}" required autofocus>

                                            @if ($errors->has('subtitle'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('subtitle') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="blog_category_id" class="col-md-4 control-label">Categoría</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="blog_category_id">
                                                @foreach($categories as $category)
                                                    @if ($news->blog_category_id  == $category->id)
                                                        <option value="{{$category->id}}" selected>{{$category->name}}</option>

                                                        @else
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endif
                                                        
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-md-12 col-offset-md-1">
                                        <textarea name="content" id="content" value="" rows="10" cols="80">
                                            {{ $news->content  }}
                                        </textarea> 
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Actualizar
                                            </button>
                                            <button type="button" class="btn btn-danger">
                                                Cancelar
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>



                    </div>
                    <div id="gallery" class="tab-pane fade {{ empty($tab['name']) || $tab['name'] == 'gallery' ? 'in active' : '' }}">
                            <div class="panel-body">
                                <h2 class="title-gral">Sube imagenes para la noticia</h2>
                                <form class="form-horizontal" method="POST" action="{{ route('blogGallery.store' ) }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="blog_news_id" value="{{$news->id}}">
                                    <input type="hidden" name="from" value="news">
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-4 control-label">Imagen(es)</label>

                                        <div class="col-md-6">
                                            <input name="filesToUpload[]" id="filesToUpload" type="file" multiple="" />

                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-4 control-label">Nombre de la imagen</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

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
                                <br>
                                <hr>
                                <br>
                                <div class="list-file-galleries">
                                    <h2>Imagenes de la noticia</h2>
                                    <ul class="galleries">
                                        @if (!$gallery)
                                            no hay imagenes
                                        @endif
                                        @foreach($gallery as $file)
                                            <li class="col-md-4 box-content-action-gallery">
                                                <img src="/uploads/gallery/{{ $file->url }}" style="width:100%; max-height:150px ">
                                                <form method="POST" action="{{ route('blogGallery.destroy', ['id' => $file->id] ) }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <input type="hidden" name="from" value="news">
                                                    <button type="submit" class="btn btn-danger delete-user" value="Delete user" onclick="return confirm('Estas seguro?')" data-toggle="tooltip" title="Eliminar"> <span class="glyphicon glyphicon-trash"></span>  </button>
                                                </form>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
