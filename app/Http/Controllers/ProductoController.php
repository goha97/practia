<?php

namespace App\Http\Controllers;

use App\Models\producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['productos']=Producto::paginate(5);
         return view('productos.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $datosProductos = request()->except('_token');
        if($request-> hasFile('Imagen')){
            $datosProductos['Imagen']=$request->file('Imagen')->store('ulpoads','public');
        }
        producto::insert($datosProductos);
        return response()->json($datosProductos);
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productos=producto::findOrFail($id);
        return view('productos.edit', compact('productos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosProductos = request()->except(['_token','_method']);

        if($request-> hasFile('Imagen')){
            $productos=producto::findOrFail($id);
            Storage::delete('public/'.$productos->Imagen);
            $datosProductos['Imagen']=$request->file('Imagen')->store('ulpoads','public');
        }

        producto::where('id','=',$id)->update($datosProductos);
        $productos=producto::findOrFail($id);
        return view('productos.edit', compact('productos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

       $productos=producto::findOrFail($id);
        if(Storage::delete('public/'.$productos->Imagen)){
        producto::destroy($id);
       }
        return redirect('productos');
    }
}
