@extends('layouts.template')

@section('head')

@section('content')
<div id="app">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Lugares Registrados</h2>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('lugares.crear') }}" class="btn btn-info float-right"><i class="fas fa-plus"></i> Agregar</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if(session('mensaje'))
                    <div class="alert alert-success">
                        {{session('mensaje')}}
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead class="thead-dark">
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
                    <tbody id="tbody">
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
                                <div class="row py-3">
                                    <a href="{{ route('editar_lugar',$lugar) }}" class="btn btn-circle btn-warning"><i class="fas fa-exclamation-triangle"></i></a>

                                    <form action="{{route('eliminar_lugar', $lugar)}}" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-circle btn-danger" type="submit" ><i class="fas fa-trash"></i></button>
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
@endsection

@section('scripts')
    
@endsection