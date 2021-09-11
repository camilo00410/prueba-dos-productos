@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            
        
        <div class="col-md-12  ">
           
            <div class="card cont-id">
                <div class="card-header bg-gray-200 text-lg font-semibold" >Productos
                        <div class="btn-group mr-2 float-right">
                            <a href="{{ route('producto.create') }}" class="btn btn-sm btn-outline-secondary bg-blue-500 text-white  border-0 py-2 px-3">Agregar nuevo producto</a>
                        </div>
                </div>

                <div class="card-body table-responsive">
                <table class="table ">
                    <thead>
                        <tr>
                        <th scope="col">N. Producto</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Existencas iniciales</th>
                        <th scope="col">Entradas</th>
                        <th scope="col">Salidas</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productos as $producto)
                            <tr>
                                <th scope="row">{{ $producto->id }}</th>
                                <td>{{ $producto->descripcion }}</td>
                                <td>{{ $producto->existencias_iniciales }}</td>
                                <td>{{ $producto->entradas }}</td>
                                <td>{{ $producto->salidas }}</td>
                                <td>{{ $producto->stock }}</td>
                                <td>
                                    <div class="row mr-3">
                                        <a href="{{ route('producto.show', $producto->id) }}" class="btn btn-sm btn-outline-secondary mr-2 bg-blue-500 border-0 rounded-md" alt="ver">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                                        </svg>
                                        </a>
                                        <a href="{{ route('producto.edit', $producto->id) }}" class="btn btn-sm btn-outline-secondary mr-2 bg-green-500 border-0 rounded-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        </a>
                                    

                                        <form action="{{ route('producto.destroy', $producto) }}" method="POST">
                                            @csrf
                                            @method('delete')   
                                            <button type="submit"  class="btn btn-sm btn-outline-secondary  bg-red-500 border-0 rounded-md" >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                   
                      
                    </tbody>
                    </table>
                    {{$productos->links()}}
                   

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
