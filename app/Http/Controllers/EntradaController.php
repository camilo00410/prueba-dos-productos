<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entradas = Entrada::orderBy('id', 'desc')->paginate(6);
        return view('entrada_producto.index', compact('entradas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::all();
        return view('entrada_producto.create', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->only([
            'producto_id', 'cantidad'
        ]);

        $val = Validator::make($input, [
            'producto_id' => 'required',
            'cantidad' => 'required'
        ]);

        if($val->fails()){
            return back()->with([
                'message_type' => 'danger',
                'message' => 'Campos requeridos'
            ]);
        }

        $val = Validator::make($input, [
            'cantidad' => 'integer'
        ]);

        if($val->fails()){
            return back()->with([
                'message_type' => 'danger',
                'message' => 'Agregue correctamente la cantidad de productos de entrada'
            ]);
        }


        Entrada::create(
            [
                'producto_id' => $input['producto_id'],
                'cantidad' => $input['cantidad'],               
            ]);


        $producto = Producto::find($input['producto_id']);
        $entradas = $producto['entradas'] + $input['cantidad'];
        $stock = $producto['stock'] + $input['cantidad'];


        $producto->update(
            [                
                'entradas' => $entradas,
                'stock' => $stock,
            ]);
    
        
            
        
        return redirect()->route('producto.index')->with([
            'message_type' => 'success',
            'message' => 'entrada agregado correctamente'
        ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function show(Entrada $entrada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function edit(Entrada $entrada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entrada $entrada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entrada $entrada)
    {
        //
    }
}
