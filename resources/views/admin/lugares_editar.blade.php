@extends('layouts.template')

@section('head')

@section('content')
<div class="container-fluid mt-3">
    <h2 class="mb-3">Editar Lugar</h2>
    @if(session('mensaje'))
        <div class="alert alert-success">
            {{session('mensaje')}}

        </div>
    @endif
    <form action="{{ route('actualizar_lugar',$lugar->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
          @csrf
              <div class="form-group">
                  <label for="exampleInputPassword1">Municipio:</label>
                  <div class="input-group">
                    <select class="form-control" name="municipioId" >
                        <option value="1">La Paz</option>
                        <option value="2">Los Cabos</option>
                        <option value="3">Comondú</option>
                        <option value="4">Loreto</option>
                        <option value="5">Múlege</option>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Categoria:</label>
                  <div class="input-group mb-3">
                    <select class="form-control" name="categoriaId" >
                        <option value="1">Hotel</option>
                        <option value="2">Restaurante</option>
                        <option value="3">Cine</option>
                        <option value="4">Escuela</option>
                        <option value="5">Estadio</option>
                        <option value="6">Bar</option>
                        <option value="7">Supermercado</option>
                        <option value="8">Playa</option>
                        <option value="9">Club nocturno</option>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Nombre:</label>
                  <div class="input-group mb-3">
                      
                      <input type="text" name="nombre" id="nombre" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" value="{{$lugar->nombre}}" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Direccion:</label>
                  <div class="input-group mb-3">
                      
                      <input type="text" name="direccion" id="direccion" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" value="{{$lugar->direccion}}" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Pagina web:</label>
                  <div class="input-group mb-3">
                      
                      <input type="text" name="paginaWeb" id="paginaWeb" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" value="{{$lugar->paginaWeb}}" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Horario:</label>
                  <div class="input-group mb-3">
                      
                      <input type="text" name="horario" id="horario" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" value="{{$lugar->horario}}" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Télefono:</label>
                  <div class="input-group mb-3">
                      
                      <input type="text" name="numTelefono" id="numTelefono" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" value="{{$lugar->numTelefono}}" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Descripción:</label>
                  <div class="input-group mb-3">
                      
                      <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" value="{{$lugar->descripcion}}" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Imagen:</label>
                  <div class="input-group mb-3">
                
                      <input type="file" name="imagen" id="imagen" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" value="{{$lugar->imagen}}" >
                  </div>
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Latitud:</label>
                  <div class="input-group mb-3">
                     
                      <input type="text" name="latitud" id="latitud" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" value="{{$lugar->latitud}}"required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Longitud:</label>
                  <div class="input-group mb-3">
                      
                      <input type="text" name="longitud" id="longitud" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" value="{{$lugar->longitud}}" required>
                  </div>
              </div>
              
            <div class="form-group">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">
                  Cancelar
                </button>
                <button class="btn btn-warning" type="submit">
	          	    Actualizar
	            </button>
            </div>
         
    </form>
</div>
@endsection