@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editando noticia "{{ $news->title }}"</div>

                <div class="panel-body">
                    <img src="/uploads/news/{{ $news->cover_page }}" style="width:100%; max-height:150px ">
                    <form class="form-horizontal" method="POST" action="{{ route('blogNew.update', ['id' => $news->id] ) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group{{ $errors->has('cover_page') ? ' has-error' : '' }}">
                            <label for="cover_page" class="col-md-4 control-label">Portada</label>

                            <div class="col-md-6">
                                <input type="file" name="cover_page">


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
                        <textarea name="content" id="content" rows="10" cols="80">
                            Contenido
                        </textarea> 
                        </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Actualizar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
