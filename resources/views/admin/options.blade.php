@extends('layouts.template')


@section('content')
<div class="card mt-4">
    <div class="card-header">
        <h3 class="m-0 font-weight-bold" style="color:#2898bf;">Actualizar contraseña</h3>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-sm-4">
                <form action="{{ route('update-password')}}" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="hidden" value="{{auth()->user()->id}}" name="id">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Contraseña nueva:</label>
                        <div class="input-group mb-3">
                            <input type="password" name="password" id="direccion" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary float-right" type="submit">
                            Actualizar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card-footer">
        
    </div>
</div>
@endsection