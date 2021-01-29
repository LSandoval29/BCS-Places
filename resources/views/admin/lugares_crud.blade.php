@extends('layouts.template')

@section('head')
<!-- Custom styles for this page -->
<link href="{{ asset('app_assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('app_assets/vendor/sweetalert/sweetalert.css') }}" rel="stylesheet"
@endsection

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3 class="m-0 font-weight-bold" style="color:#2898bf;">Lugares Registrados en {{$municipio->nombre}}</h3>
            </div>
            <div class="col-md-6">
                <button class="btn btn-success btn-icon-split m-0 float-right"
                data-toggle="modal" data-target="#mymodal" title="Agregar nuevo">
                    
                    <span class="icon text-white-50">
                        <i class="fas fa-plus-circle"></i>
                        Nuevo
                    </span>
                </button>           
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                <div class="col-md-6">
                                    <a href="{{ route('editar_lugar',$lugar) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                </div>
                                <div class="col-md-6">
                                    <button onclick="deleteThis({{$lugar->id}},this)" class="btn btn-danger btn-sm"     data-toggle="tooltip" data-placement="top">
                                        <b><i class="fas fa-trash"></i></b>
                                    </button>
                                </div>
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
@endsection

@section('modals')
<!--Modal de Agregar-->
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="{{ route('agregar_lugar') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
                <input type="hidden" name="municipioId" value="{{$municipio->id}}">
                <div class="form-group">
                    <label for="exampleInputPassword1">Categoria:</label>
                    <div class="input-group mb-3">
                        <select class="form-control" name="categoriaId" required>
                            <option value="" disabled selected>Seleccione la categoria...</option>
                            @foreach($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nombre:</label>
                    <div class="input-group mb-3">
                        
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Direccion:</label>
                    <div class="input-group mb-3">
                        
                        <input type="text" name="direccion" id="direccion" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Pagina web:</label>
                    <div class="input-group mb-3">
                        
                        <input type="text" name="paginaWeb" id="paginaWeb" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Horario:</label>
                    <div class="input-group mb-3">
                        
                        <input type="text" name="horario" id="horario" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Télefono:</label>
                    <div class="input-group mb-3">
                        
                        <input type="text" name="numTelefono" id="numTelefono" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Descripción:</label>
                    <div class="input-group mb-3">
                        <textarea class="form-control" required name="descripcion"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Imagen:</label>
                    <div class="input-group mb-3">
                    
                        <input type="file" name="imagen" id="imagen" placeholder="" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Latitud:</label>
                    <div class="input-group mb-3">
                        
                        <input type="number" name="latitud" id="latitud" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Longitud:</label>
                    <div class="input-group mb-3">
                        
                        <input type="number" name="longitud" id="longitud" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">
                    Cancelar
                    </button>
                    <button class="btn btn-primary" type="submit">
                        Agregar
                    </button>
                </div>            
          </div>
        </form>
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

<script type="text/javascript">

    function deleteThis(id,button){
        //console.log(id);
        Swal.fire({
            title: 'Desea eliminar este registro?',
            text: "El registro sera eliminado!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/eliminar_lugar/${id}`,
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function(data){
                        if (data.code>0) {
                            Swal.fire(
                                'Eliminado!',
                                'Registro eliminado correctamente.',
                                'success'
                            )
                        .then((value) => {
                            $(button).parent().parent().parent().fadeOut()
                        })
                        }else{
                            swal("Error","No encontramos lo que buscaba!","error")
                        }
                    }
                });
            
                }
            })
    }


</script>
@endsection



