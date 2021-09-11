@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center ">
            
        
        <div class="col-md-12 ">
            
            <div class="card cont-id">
                <div class="card-header bg-gray-200 text-lg font-semibold" >Entradas de productos
                        <div class="btn-group mr-2 float-right">
                            <a href="{{ route('entrada.create') }}" class="btn btn-sm btn-outline-secondary border-0 py-2 px-3 bg-blue-500 text-white">Crear nuevo usuario</a>
                        </div>
                </div>

                <div class="card-body table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">N. FACTURA</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Codigo producto</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($entradas as $entrada)
                            <tr>
                            <th scope="row">{{$entrada->id}}</th>
                            <td>{{$entrada->created_at}}</td>
                            <td>{{$entrada->producto_id}}</td>                                                                                        
                            <td>{{$entrada->producto->descripcion}}</td>     
                            <td>{{$entrada->cantidad}}</td>                                                                            
                            </td>
                         @endforeach

                            </tr>
                    </tbody>
                    </table>
                   

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
