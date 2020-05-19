@extends('layouts.template')

@section('head')
<!-- Custom styles for this page -->
<link href="{{ asset('app_assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('app_assets/vendor/sweetalert/sweetalert.css') }}" rel="stylesheet"
@endsection

@section('content')
<div class="container-fluid mb-5">

  <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold" style="color:#2898bf;">{{$section_name}}</h5>
      </div>
      <div class="col-md-12">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Municipio</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Municipio</th>
                        <th>Acciones</th> 
                      </tr>
                    </tfoot>
                    <tbody>
                    @if(isset($municipios) && count($municipios)>0)
                        @foreach($municipios as $municipio)
                            <tr>
                            <td>{{$municipio->nombre}}</td>
                            <td>
                                <a class="btn btn-info btn-sm" href="/municipio/{{$municipio->id}}">
                                <i class="fas fa-place-of-worship"></i>
                                    Ver
                                </a>
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



