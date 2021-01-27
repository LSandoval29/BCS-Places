@extends('layouts.template')


@section('content')
<div class="card mb-5">
    <div class="card-header">
        <h3 class="m-0 font-weight-bold" style="color:#2898bf;">Editar Lugar</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('actualizar_lugar',$lugar->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="exampleInputPassword1">Municipio:</label>
                <div class="input-group">
                    <select class="form-control" name="municipioId" >
                        <option value="" disabled selected>Seleccione el municipio...</option>
                        @foreach($municipios as $municipio)
                            <option value="{{$municipio->id}}">{{$municipio->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Categoria:</label>
                <div class="input-group mb-3">
                    <select class="form-control" name="categoriaId" >
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
                    <textarea class="form-control" required name="descripcion">{{$lugar->descripcion}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Imagen:</label>
                <div class="input-group mb-3">
                
                    <input type="file" name="imagen" id="imagen" placeholder="" aria-label="Username" aria-describedby="basic-addon1" value="{{$lugar->imagen}}" >
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
            
            <div class="card-footer">
                <button class="btn btn-warning" type="submit">
                    Actualizar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection