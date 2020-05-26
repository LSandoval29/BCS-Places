@extends('layouts.template')

@section('head')
<!-- Custom styles for this page -->
<link href="{{ asset('app_assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('app_assets/vendor/sweetalert/sweetalert.css') }}" rel="stylesheet"
@endsection

@section('content')
<div class="container-fluid mb-5">

  <div class="card shadow mb-4">
      <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3 class="m-0 font-weight-bold" style="color:#2898bf;">Lugares Registrados</h3>
            </div>
            <div class="col-md-6">
                <a href="{{ route('lugares.crear') }}" class="btn btn-info float-right"><i class="fas fa-plus"></i> Agregar</a>
            </div>
        </div>
      </div>
      <div class="col-md-12">
         @if(session('mensaje'))
            <div class="alert alert-success">
                {{session('mensaje')}}
            </div>
         @endif
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    <th>Categoria</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Página Web</th>
                    <th>Horario</th>
                    <th>Télefono</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>Categoria</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Página Web</th>
                    <th>Horario</th>
                    <th>Télefono</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                    </tr>
                </tfoot>
                <tbody>
                @if(isset($lugares) && count($lugares)>0)
                    @foreach($lugares as $lugar)
                    <tr>
                        <td>{{$lugar->Categoria->nombre}}</td>
                        <td>{{$lugar->nombre}}</td>
                        <td>{{$lugar->direccion}}</td>
                        <td><a href="{{$lugar->paginaWeb}}" target="_blank">{{$lugar->paginaWeb}}</a></td>
                        <td>{{$lugar->horario}}</td>
                        <td>{{$lugar->numTelefono}}</td>
                        <td>{{$lugar->descripcion}}</td>
                        <td>
                            <div class="row">
                                <a href="{{ route('editar_lugar',$lugar) }}" class="btn btn-warning btn-sm"><i class="fas fa-exclamation-triangle"></i></a>

                                <form action="{{route('eliminar_lugar', $lugar)}}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm" type="submit" ><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            </div>
        </div>
      </div>
  </div>
  
</div>
@endsection

@section('scripts')
<!-- Page level plugins -->
<script src="{{ asset('app_assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('app_assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Page level custom scripts -->
<script src="{{ asset('app_assets/js/demo/datatables-demo.js') }}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="{{ asset('app_assets/vendor/sweetalert/sweetalert.min.js') }}"></script>
@endsection



