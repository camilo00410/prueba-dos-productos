@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row ">
        <main class="col-md-6 mx-sm-auto px-4 cont">
            <div class=" pb-2 mb-3 border-bottom text-center">
                <h1 class="h2 text-uppercase font-semibold">Editar Producto</h1>
            </div>
                    <form method="POST" action="{{ route('producto.update', $producto)}}">
                        @csrf
                        @method('put')

                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripción</label>
                            <div class="col-md-6">
                                <input id="descripcion" type="text" class="form-control" name="descripcion" value="{{ $producto->descripcion }}" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="existencias_inciales" class="col-md-4 col-form-label text-md-right">Existencias actuales</label>                            
                            <div class="col-md-6">
                                <input id="existencias_inciales" type="text" class="form-control" value="{{ $producto->existencias_iniciales }}" name="existencias_iniciales">
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Agregar
                                </button>
                            </div>
                        </div>
                    </form>
                    </main>
    </div>
</div>
@endsection
