@extends('layouts.template')

@section('head')
<link href="{{ asset('app_assets/vendor/sweetalert/sweetalert.css') }}" rel="stylesheet"
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="row">
        <div class="col-md-6">
          <h3 class="m-0 font-weight-bold" style="color:#2898bf;">{{$section_name}}</h3>
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
                                <i class="fas fa-info-circle"></i>
                                  Ver
                              </a>
                              <button onclick="getDataBack({{$municipio->id}})"
                                class="btn btn-warning btn-sm"
                                data-toggle="modal" data-target="#mymodaledit" title="Editar">
                                    <b><i class="fas fa-edit"></i> Editar</b>
                              </button>
                              <button onclick="deleteThis({{$municipio->id}},this)" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top">
                                  <b><i class="fas fa-trash"></i> Eliminar</b>
                              </button>
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
        <form action="{{ route('municipios.store') }}" method="POST">
          @csrf
          <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Nombre:</label>
                    <div class="input-group mb-3">
                        
                        <input type="text" name="nombre" id="nombre" class="form-control" required>
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

<!--Modal de editar-->
<div class="modal fade" id="mymodaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
       <form action="{{ route('municipios.update') }}" method="POST">
          @method('PUT')
          @csrf
          <input type="hidden" id="id" name="id">
          <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Nombre:</label>
                    <div class="input-group mb-3">
                        
                        <input type="text" name="nombre" id="nombreEdit" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">
                    Cancelar
                    </button>
                    <button class="btn btn-primary" type="submit">
                        Actualizar
                    </button>
                </div>            
          </div>
        </form>
      </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="{{ asset('app_assets/vendor/sweetalert/sweetalert.min.js') }}"></script>

<script type="text/javascript">

    function getDataBack(id){
        //console.log(id)
        if($.trim(id) != ''){
            $.ajax({
                type:'GET',
                url:`/municipios/get/${id}`,
                success:function(response){
                    //console.log(response.data)
                    $("#nombreEdit").val(response.data.nombre)
                    $("#id").val(id)//Pasamos el id para hacer la actualizacion del registro correspondiente.
                }
            
            })
        }

    }

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
                    url: `/municipios/${id}`,
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function(data){
                        if (data.code>0) {
                            Swal.fire(
                                'Eliminado!',
                                data.message,
                                'success'
                            )
                        .then((value) => {
                            $(button).parent().parent().fadeOut()
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


