@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card cont-id">
                <div class="card-header text-xl bg-gray-200 uppercase font-semibold">{{$producto->descripcion}}</div>

                <div class="card-body">
                <br>
               


             

                <div class="row table-show">
                    <div class="col-6 fat">Existencias Iniciales:</div>
                    <div class="col-6 son">{{$producto->existencias_iniciales}}</div>
                </div>
                <div class="row table-show">
                    <div class="col-6 fat">Entradas:</div>
                    <div class="col-6 son">{{$producto->salidas}}</div>
                </div>
                <div class="row table-show">
                    <div class="col-6 fat">Salidas:</div>
                    <div class="col-6 son">{{$producto->salidas}}</div>
                </div>
                <div class="row table-show">
                    <div class="col-6 fat">Stock:</div>
                    <div class="col-6 son">{{$producto->stock}}</div>
                </div>
                <div class="row table-show">
                    <div class="col-6 fat">Fecha del producto Agregado:</div>
                    <div class="col-6 son">{{$producto->created_at}}</div>
                </div>
                <div class="row table-show" style="border-bottom: 1px solid rgb(214, 214, 214);">
                    <div class="col-6 fat">Fecha del producto Actualizado:</div>
                    <div class="col-6 son">{{$producto->updated_at}}</div>
                </div>
                <br><br>

                <div class="flex-row">        
                        <a class="btn btn-primary" href="{{ route('producto.index') }}"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
                        </svg></a>                    
                        <a class="btn btn-success" href="{{ route('producto.edit', $producto) }}"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg></a>
                        <form action="{{ route('producto.destroy', $producto) }}" method="POST" class="inline">
                            @csrf
                            @method('delete')   
                            <button class="btn btn-danger" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            </button>
                        </form>                    
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
