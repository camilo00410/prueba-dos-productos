<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Salida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salidas = Salida::orderBy('id', 'desc')->paginate(6);
        return view('salida_producto.index', compact('salidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::all();
        return view('salida_producto.create', compact('productos'));
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
                'message' => 'Agregue correctamente la cantidad de productos de salida'
            ]);
        }


        Salida::create(
            [
                'producto_id' => $input['producto_id'],
                'cantidad' => $input['cantidad'],               
            ]);


        $producto = Producto::find($input['producto_id']);
        $salidas = $producto['salidas'] + $input['cantidad'];
        $stock = $producto['stock'] - $input['cantidad'];


        $producto->update(
            [                
                'salidas' => $salidas,
                'stock' => $stock,
            ]);
    
        
            
        
        return redirect()->route('producto.index')->with([
            'message_type' => 'success',
            'message' => 'salida de productos realizada correctamente'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function show(Salida $salida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function edit(Salida $salida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salida $salida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salida $salida)
    {
        //
    }
}
