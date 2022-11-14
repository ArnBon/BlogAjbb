@extends('admin.layout')

@section('header')
 <h1>
        POSTS
        <small>Listado</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Posts</li>
      </ol>
@stop

@section('content')
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de Publicaciones</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="posts-table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Cedula</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Equipos</th>
                  <th>Acciones</th>                 
                </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach($especialistas as $espec)
                           <td>{{ $espec->cedula }}</td>
                           <td>{{ $espec->nombres }}</td>
                           <td>{{ $espec->apellidos }}</td>
                           <td>{{ $espec->$equipos->serial }}</td>
                           <td>
                                <a href="#" 
                                class="btn btn-xs btn-default" target="_blank"> 
                                <i class = "fa fa-eye" >                                  
                                </i>
                                </a>
                                <a href="#" class="btn btn-xs btn-info" target="_blank"><i class = "fa fa-pencil"></i></a>
                                <a href="#" class="btn btn-xs btn-danger"><i class = "fa fa-trash"></i></a>
                            </td>
                    </tr>
                        @endforeach                           
                </tbody>
                <tfoot>
                <tr>
                  <th>Cedula</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Acciones</th>                 
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
@stop

@push('styles')
<!-- DataTables css-->
  <link rel="stylesheet" href="/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endpush

@push('scripts')
<!-- DataTables js-->
<script src="/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Datatables -->
   <script>
  $(function () {    
    $('#posts-table').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script> 

@endpush