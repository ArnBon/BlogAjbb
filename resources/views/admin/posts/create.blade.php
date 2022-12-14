@extends('admin.layout')

@section('header')
 <h1>
        POSTS
        <small>Crear publicación</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{ route('admin.posts.index') }}"><i class="fa fa-list"></i> Posts</a></li>
        <li class="active">Crear</li>
      </ol>
@stop

@section('content')
<div class="row">
  <form method="POST" action ="{{ route('admin.posts.store') }}">
    {{ csrf_field() }}
    <div class="col-md-8">

      <div class="box box-primary">

          <div class="box-body">
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
              <label>Título de la publicación</label>
              <input name="title" 
              class="form-control" 
              placeholder="Ingresa aquí el titulo de la publicación"
              value="{{ old('title') }}">

              {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
              <label>Contenido publicación</label>
<<<<<<< Updated upstream
              <textarea rows="10" id="editor" name="body" class="form-control" placeholder="Ingresa un extracto de la publicación">{{ old('body') }}</textarea>
               {!! $errors->first('body', '<span class="help-block">:message</span>') !!}
=======
              <textarea rows="10" id="editor" name="body" class="form-control" placeholder="Ingresa un extracto de la publicación"></textarea>
>>>>>>> Stashed changes
            </div>
          </div>
        
      </div>
    </div>

    <div class="col-md-4">

      <div class="box box-primary"> 

        <div class="box-body">
          <!-- Date -->
              <div class="form-group">
                <label>Fecha de publicación:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input name="published_at"
                         value="{{ old('published_at') }}"
                         type="text" 
                         class="form-control pull-right" 
                         id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
            <!-- /.form group -->
            <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
              <label>Categorías</label>
              <select name="category" class="form-control">
                <option value="">Seleccione una categoría</option>
                @foreach($categories as $category)
<<<<<<< Updated upstream
                  <option value="{{ $category->id }}"
                    {{ old('category') == $category->id ? 'selected' : '' }}
                    >{{ $category->name }}</option>
=======
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
>>>>>>> Stashed changes
                @endforeach
              </select>
              {!! $errors->first('category', '<span class="help-block">:message</span>') !!}
            </div>

           <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
            <label>Etiquetas</label>
            <select name="tags[]" class="form-control select2" 
                    multiple="multiple"
                    data-placeholder="Selecciona una o mas etiquetas"
                    style="width: 100%;">
                    @foreach($tags as $tag)
<<<<<<< Updated upstream
                      <option 
                        {{ collect(old('tags'))->contains($tag->id) ? 'selected' : '' }} 
                        value="{{ $tag->id }}">
                        {{ $tag->name }}
                      </option>
=======
                      <option value="{{ $tag->id }}">{{ $tag->name }}</option>
>>>>>>> Stashed changes
                    @endforeach
            </select>
            {!! $errors->first('tags', '<span class="help-block">:message</span>') !!}
             
           </div>

          <div class="form-group {{ $errors->has('excerpt') ? 'has-error' : '' }}">
              <label>Extracto publicación</label>
              <textarea name="excerpt" class="form-control" placeholder="Ingresa un extracto de la publicación">{{old('excerpt')}}</textarea>
              {!! $errors->first('excerpt', '<span class="help-block">:message</span>') !!}
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Guardar publicación

            </button>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>

@stop
@push('styles')
<!-- bootstrap datepicker css-->
  <link rel="stylesheet" href="/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Select2 -->
  <link rel="stylesheet" href="/adminlte/bower_components/select2/dist/css/select2.min.css">
@endpush

@push('scripts')
<!-- CK Editor -->
<script src="/adminlte/bower_components/ckeditor/ckeditor.js"></script><!--descargue la version 4.6.2 y la renombre la verion vieja como ckeditorold -->
<!-- Select2 -->
<script src="/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- bootstrap datepicker js-->
<script src="/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
//Date picker
   <script>
    $('#datepicker').datepicker({
      autoclose: true
    });

    CKEDITOR.replace( 'editor' );

    //Initialize Select2 Elements
    $('.select2').select2()
                
    </script> 

@endpush

   

    

  