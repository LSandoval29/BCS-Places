@extends('layouts.template')

@section('head')

@section('content')
<div class="container-fluid mt-3">
    <div class="col-md-10 mx-auto">
        @if(session('mensaje'))
            <div class="alert alert-success">
                {{session('mensaje')}}
            </div>
        @endif
        <div class="card-body">
            <h3 class="m-0 font-weight-bold mb-3" style="color:#2898bf;">Agregar un Lugar</h3>
            <form action="{{ route('agregar_lugar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="exampleInputPassword1">Municipio:</label>
                        <div class="input-group">
                            <select class="form-control" name="municipioId">
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
                            <select class="form-control" name="categoriaId">
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
                            
                            <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" required>
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
                            
                            <input type="text" name="latitud" id="latitud" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Longitud:</label>
                        <div class="input-group mb-3">
                            
                            <input type="text" name="longitud" id="longitud" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">
                            Agregar
                        </button>
                    </div>
                
            </form>
        </div>

    </div>
</div>
@endsection