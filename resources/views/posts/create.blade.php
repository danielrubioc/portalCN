@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Nueva Noticia</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('posts.store' ) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('cover_page') ? ' has-error' : '' }}">
                            <label for="cover_page" class="col-md-4 control-label">Portada</label>

                            <div class="col-md-6">
                                <input type="file" name="cover_page" required>


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
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('name') }}" required autofocus>

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
                                <input id="subtitle" type="text" class="form-control" name="subtitle" value="{{ old('subtitle') }}" required autofocus>

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
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="blog_category_id" class="col-md-4 control-label">Tags</label>
                            <div class="col-md-6">
                                <select class="form-control js-multiple" name="tags[]" multiple="multiple">
                                  
                                    @foreach($tags as $tag)
                                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-10 col-offset-md-1">
                        <textarea name="content" id="content" rows="10" cols="80">
                            Contenido
                        </textarea> 
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type="text/javascript">
        $(".js-multiple").select2({
            placeholder: "Selecciona los tags",
            tags: true,
            tokenSeparators: [',', ' '],
            createTag: function (params) {
                // Don't offset to create a tag if there is no @ symbol
                if (params.term.indexOf('@') === -1) {
                  // Return null to disable tag creation
                  return null;
                }

                return {
                  id: params.term,
                  text: params.term
                }
            }
        })
    </script>
@stop

@endsection
