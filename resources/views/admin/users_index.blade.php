@extends('layouts.template')

@section('content')
<div class="card card-solid mb-4">
    <div class="card-header p-2">
        <div class="row">
            <div class="col-md-6">  
                <h3 class="m-0 font-weight-bold" style="color:#2898bf;">Usuarios</h3>
            </div>
            <div class="col-md-6">
                <button class="btn btn-success btn-icon-split m-0 float-right"
                    data-toggle="modal" data-target="#mymodal" title="Agregar nuevo">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus-circle"></i>
                    </span>
                    <span class="text">Agregar nuevo usuario</span>
                </button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row d-flex align-items-stretch">
        @foreach($users as $user)
        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
            <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                    Administrador
                </div>
                <div class="card-body">
                    <div class="tab-content" id="teachers">
                        <div class="active tab-pane">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead mb-3 mt-3 font-weight-bold"><b>{{$user->name}}</b></h2>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-envelope"></i></span> Correo: {{$user->email}}</li> 
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="{{asset('app_assets/imagenes/user.png')}}" alt="" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <button onclick="getDataBack({{$user->id}})"
                            class="btn btn-warning float-right"
                            data-toggle="modal" data-target="#mymodaledit" title=Editar">
                                <b><i class="fas fa-edit"></i> Editar</b>
                        </button>
                    </div>
                    <div class="text-left">
                        <button onclick="deleteThis({{$user->id}},this)" class="btn btn-danger" data-toggle="tooltip" data-placement="top">
                            <b><i class="fas fa-trash"></i> Eliminar</b>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- /.card-body -->
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
        <form action="{{ route('users.store') }}" method="POST">
          @csrf
          <div class="modal-body">
              <div class="form-group">
                  <label>Nombre(s)</label>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-user"></i>
                        </span>
                      </div>
                      <input type="text" name="name" id="name" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                  </div>
              </div>
              <div class="form-group">
                  <label>Correo</label>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-envelope"></i>
                        </span>
                      </div>
                      <input type="email" name="email" id="email" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                  </div>
              </div>
              <div class="form-group">
                  <label>Contraseña</label>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-key"></i>
                        </span>
                      </div>
                      <input type="password" name="password" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
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
        <form action="{{ route('users.update') }}" method="POST">
          @method('PUT')
          @csrf
          <input type="hidden" id="id" name="id">
          <div class="modal-body">
              <div class="form-group">
                  <label for="exampleInputPassword1">Nombre(s)</label>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-user"></i>
                        </span>
                      </div>
                      <input type="text" name="name" id="nameEdit" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Correo</label>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-envelope"></i>
                        </span>
                      </div>
                      <input type="email" name="email" id="emailEdit" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" required>
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
<script type="text/javascript">

    function getDataBack(id){
        console.log(id)
        if($.trim(id) != ''){
            $.ajax({
                type:'GET',
                url:`/users/get/${id}`,
                success:function(response){
                    //console.log(response.data)
                    $("#nameEdit").val(response.data.name)
                    $("#emailEdit").val(response.data.email)

                    $("#id").val(id)//Pasamos el id para hacer la actualizacion del registro correspondiente.
                }
            
            })
        }

    }

    function deleteThis(id,button){
        console.log(id);
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
                    url: `/users/${id}`,
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