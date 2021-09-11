<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::orderBy('id', 'desc')->paginate(6);
        return view('producto.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producto.create');
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
            'descripcion', 'existencias_iniciales'
        ]);

        $val = Validator::make($input, [
            'descripcion' => 'required',
            'existencias_iniciales' => 'required'
        ]);

        if($val->fails()){
            return back()->with([
                'message_type' => 'danger',
                'message' => 'Campos requeridos'
            ]);
        }


        $val = Validator::make($input, [
            'existencias_iniciales' => 'integer'
        ]);

        if($val->fails()){
            return back()->with([
                'message_type' => 'danger',
                'message' => 'Agregue correctamente la cantidad de productos existentes'
            ]);
        }

        $entradas = 0;
        $salidas = 0;
        $stock = $input['existencias_iniciales'];

        Producto::create(
            [
                'descripcion' => $input['descripcion'],
                'existencias_iniciales' => $input['existencias_iniciales'],
                'entradas' => $entradas,
                'salidas' => $salidas,
                'stock' => $stock
            ]);
        
        return redirect()->route('producto.index')->with([
            'message_type' => 'success',
            'message' => 'producto agregado correctamente'
        ]);


    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        return view('producto.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $input = $request->only([
            'descripcion', 'existencias_iniciales'
        ]);

        $val = Validator::make($input, [
            'descripcion' => 'required',
            'existencias_iniciales' => 'required'
        ]);

        if($val->fails()){
            return back()->with([
                'message_type' => 'danger',
                'message' => 'Campos requeridos'
            ]);
        }


        $val = Validator::make($input, [
            'existencias_iniciales' => 'integer'
        ]);

        if($val->fails()){
            return back()->with([
                'message_type' => 'danger',
                'message' => 'Agregue correctamente la cantidad de productos existentes'
            ]);
        }
     
        $stock = $input['existencias_iniciales'];


        $producto->update(
            [
                'descripcion' => $input['descripcion'],
                'existencias_iniciales' => $input['existencias_iniciales'],             
                'stock' => $stock
            ]);
        
        return redirect()->route('producto.index')->with([
            'message_type' => 'success',
            'message' => 'producto actualizado correctamente'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('producto.index')->with([
            'message_type' => 'success',
            'message' => 'Producto eliminado correctamente'
        ]);
    }
}
