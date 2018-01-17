@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Nuevo taller</div>
                <ul class="nav nav-pills nav-gallery">
                    <li class="{{ empty($tab['name']) || $tab['name'] == 'info' ? 'active' : '' }}"><a data-toggle="pill" href="#info">Información de taller</a></li>
                    <li class="{{ empty($tab['name']) || $tab['name'] == 'lessons' ? 'active' : '' }}"><a data-toggle="pill" href="#lessons">Calendario de clases</a></li>
                </ul>

                <div class="tab-content">
                    <div id="info" class="tab-pane fade {{ empty($tab['name']) || $tab['name'] == 'info' ? 'in active' : '' }}">
                        <div class="panel-body">
                        <?php if ($workshops->cover_page): ?>
                            <img src="{{url('/uploads/workshop')}}/{{ $workshops->cover_page }}" style="width:100%; max-height:150px ">
                        <?php endif ?>

                            <form class="form-horizontal" method="POST" action="{{ route('workshops.update', ['id' => $workshops->id] ) }}" enctype="multipart/form-data">
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
                                        <input id="subtitle" type="text" class="form-control" name="subtitle" value="{{ old('subtitle') }}" required autofocus>

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

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="teachers" class="col-md-4 control-label">Profesores a Cargo</label>
                                    <div class="col-md-6">
                                        
                                        <select class="form-control js-multiple" name="teachers[]" multiple="multiple" required>
                                        
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
                                
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="title" class="col-md-4 control-label"> Cupos </label>

                                    <div class="col-md-6">
                                        <input id="quotas" type="number" class="form-control" name="quotas" value="{{ $workshops->quotas }}" required autofocus>

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
                                        <input id="about_quotas" type="number" class="form-control" name="about_quotas" value="{{ $workshops->about_quotas }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
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

                    <div id="lessons" class="tab-pane fade {{ empty($tab['name']) || $tab['name'] == 'lessons' ? 'in active' : '' }}">
                        <div class="panel-body">
                            
                            <form class="form-horizontal" method="POST" action="{{ route('lessons.store' ) }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <input id="workshop_id" name="workshop_id" value="{{ $workshops->id }}" type="hidden" />
                                
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="title" class="col-md-4 control-label"> Lugar </label>

                                    <div class="col-md-6">
                                        <input id="place" type="text" class="form-control" name="place" value="{{ old('place') }}" required autofocus>

                                        @if ($errors->has('place'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('place') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('birth_date') ? ' has-error' : '' }}">
                                    <label for="birth_date" class="col-md-4 control-label">Fecha</label>
                                    <div class="col-md-6">
                                        <input id="birth_date" type="date" class="form-control" name="date" value="{{ old('date') }}" required autofocus>
                                        @if ($errors->has('birth_date'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('birth_date') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('horario') ? ' has-error' : '' }}">
                                    <label for="teachers" class="col-md-4 control-label">Horario</label>
                                    <div class="col-md-6">
                                        <input id="hour" type="date" class="form-control" name="hour" value="{{ old('hour') }}" required autofocus>
                                    </div>                   
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <div class="col-md-offset-1 col-md-10">
                                        <textarea id="description"  type="text" class="form-control" name="description" value="{{ old('description') }}" required autofocus></textarea>
                                            
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
                                            Guardar clase
                                        </button>
                                    </div>
                                </div>

                                <div class="col-md-10 col-md-offset-1">
                                    <table class="table table-responsive table-perzonalise table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Lugar</th>
                                                <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($lessons as $lesson)
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>{{ $lesson->date }}</td>
                                                    <td>{{ $lesson->place }}</td>
                                                </tr>
                                            @endforeach                                                                                    
                                        </tbody>
                                    </table>
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
    $('#description').ckeditor();
    </script>
    @stop

@endsection