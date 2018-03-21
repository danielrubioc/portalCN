@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="control-btne-crud">
            <a href="{{ URL::to('workshops') }}" class="btn btn-success btn-create-gral">Volver a Talleres</a>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Taller</div>


                <div class="tab-content">
                    <div id="info" class="tab-pane fade {{ empty($tab['name']) || $tab['name'] == 'info' ? 'in active' : '' }}">
                        <div class="panel-body" style="text-align: center;" >
                            <div class="img-min-avatar">
                                    @if ($workshops->cover_page)
                                        <img src="{{url('/uploads/workshop')}}/{{ $workshops->cover_page }}" style="width:100%; max-height:150px ">
                                    @endif
                            </div>

                            <form class="form-horizontal text-align-left" method="POST" action="{{ route('workshops.update', ['id' => $workshops->id] ) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <div class="form-group{{ $errors->has('cover_page') ? ' has-error' : '' }}">
                                    <label for="cover_page" class="col-md-4 control-label">Portada</label>

                                    <div class="col-md-6">
                                        <input type="file" name="cover_page" accept=".png, .jpg, .jpeg">


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
                                        <input id="title" type="text" class="form-control" name="name" value="{{ $workshops->name }}" required autofocus>

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
                                        <input id="subtitle" type="text" class="form-control" name="subtitle" value="{{ $workshops->subtitle }}" autofocus>

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
                                        <input id="url" type="text" class="form-control" name="url" value="{{ $workshops->url }}" required autofocus>

                                        @if ($errors->has('url'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('url') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="teachers" class="col-md-4 control-label">Profesores a Cargo</label>
                                    <div class="col-md-6">
                                        
                                        <select class="form-control js-multiple" name="teachers[]" multiple="multiple">
                                        
                                            @foreach($teachers as $teacher)
                                                @if (array_search($teacher['id'], array_column($teachersInWorkshops, 'id')) !== false ){
                                                    <option value="{{$teacher->id}}" selected>{{$teacher->name}} {{$teacher->last_name}}</option>
                                                @else
                                                    <option value="{{$teacher->id}}">{{$teacher->name}} {{$teacher->last_name}}</option>
                                                @endif
                                
                                            @endforeach

                                        </select>

                                    </div>                            
                                </div>
                                
                                <div class="form-group{{ $errors->has('age_min') ? ' has-error' : '' }}">
                                    <label for="title" class="col-md-4 control-label"> Edad mínima </label>

                                    <div class="col-md-6">
                                        <input id="age_min" type="number" class="form-control" name="age_min" value="{{ $workshops->age_min }}" min="0" required autofocus>

                                        @if ($errors->has('age_min'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('age_min') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('age_max') ? ' has-error' : '' }}">
                                    <label for="title" class="col-md-4 control-label"> Edad máxima </label>

                                    <div class="col-md-6">
                                        <input id="age_max" type="number" class="form-control" name="age_max" value="{{ $workshops->age_max }}" min="0" required autofocus>

                                        @if ($errors->has('age_max'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('age_max') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                
                                <div class="form-group{{ $errors->has('quotas') ? ' has-error' : '' }}">
                                    <label for="title" class="col-md-4 control-label"> Cupos </label>

                                    <div class="col-md-6">
                                        <input id="quotas" type="number" class="form-control" name="quotas" value="{{ $workshops->quotas }}" min="0" required autofocus>

                                        @if ($errors->has('quotas'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('quotas') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('about_quotas') ? ' has-error' : '' }}">
                                    <label for="title" class="col-md-4 control-label"> Sobre Cupos </label>

                                    <div class="col-md-6">
                                        <input id="about_quotas" type="number" class="form-control" name="about_quotas"  min="0" value="{{ $workshops->about_quotas }}" required autofocus>

                                        @if ($errors->has('about_quotas'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('about_quotas') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('place') ? ' has-error' : '' }}">
                                    <label for="title" class="col-md-4 control-label"> Lugar </label>

                                    <div class="col-md-6">
                                        <input id="title" type="text" class="form-control" name="place" value="{{ $workshops->place }}" required autofocus>

                                        @if ($errors->has('place'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('place') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                    <label for="type" class="col-md-4 control-label">Categoría</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="category_id">
                                            @foreach($categories as $category)
                                                @if ($workshops->category_id  == $category->id)
                                                    <option value="{{$category->id}}" selected>{{$category->name}}</option>

                                                    @else
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endif
                                                    
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                    <label for="type" class="col-md-4 control-label">Tipo</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="type">
                                            @foreach($types as $type)
                                                @if ($workshops->type  == $type->id)
                                                    <option value="{{$type->id}}" selected>{{$type->name}}</option>

                                                    @else
                                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                                @endif
                                                    
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                    <label for="type" class="col-md-4 control-label">Estado</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="status">
                                            @foreach($statuses as $status)
                                                @if ($workshops->status  == $status->id)
                                                    <option value="{{$status->id}}" selected>{{$status->name}}</option>

                                                    @else
                                                    <option value="{{$status->id}}">{{$status->name}}</option>
                                                @endif
                                                    
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <div class="col-md-offset-1 col-md-10">
                                        <textarea id="content"  type="text" class="form-control" name="description" required autofocus>
                                        {{ $workshops->description }}
                                        </textarea>
                                            
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
                                            Guardar
                                        </button>
                                    </div>
                                </div>
                            </form>                  

                        </div>
                    </div>
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
            teachers: true,
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