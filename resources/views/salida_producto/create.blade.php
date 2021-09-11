@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row ">
        <main class="col-md-6 mx-sm-auto px-4 cont">
            <div class=" pb-2 mb-3 border-bottom text-center">
                <h1 class="h2 text-uppercase font-semibold">Agregar Salida de Producto</h1>
            </div>
                    <form method="POST" action="{{ route('salida.store')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="producto" class="col-md-4 col-form-label text-md-right">Producto</label>   
                            <div class="col-md-6">
                                <select class="form-control" id="selectChannel" name="producto_id">
                                        <option selected>Seleccionar...</option>
                                    @foreach($productos as $producto)
                                        <option value="{{$producto->id}}">{{$producto->descripcion}}</option>
                                    @endforeach
                                </select>
                            </div>                         
                        </div>

                        <div class="form-group row">
                            <label for="existencias_inciales" class="col-md-4 col-form-label text-md-right">Cantidad</label>                            
                            <div class="col-md-6 ">
                                <input id="cantidad" type="number" class="form-control" name="cantidad">
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
