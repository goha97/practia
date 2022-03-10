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

        $campos=[
            'Nombre'=>'required|string|max:100',
            'Marca'=>'required|string|max:100',
            'Modelo'=>'required|string|max:100',
            'Valor'=>'required|string|max:100',
            'Imagen'=>'required|max:10000|mimes:jpeg,png,jpg',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Imagen.required'=>'La foto es requerida',
        ];
        $this->validate($request,$campos,$mensaje);
        //
        $datosProductos = request()->except('_token');
        if($request-> hasFile('Imagen')){
            $datosProductos['Imagen']=$request->file('Imagen')->store('ulpoads','public');
        }
        producto::insert($datosProductos);
      //  return response()->json($datosProductos);
       return redirect('productos')->with ('mensaje','se ha agregado con exito');
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

        $campos=[
            'Nombre'=>'required|string|max:100',
            'Marca'=>'required|string|max:100',
            'Modelo'=>'required|string|max:100',
            'Valor'=>'required|string|max:100',

        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',

        ];
        if($request-> hasFile('Imagen')){

            $campos=['Imagen'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=[ 'Imagen.required'=>'La foto es requerida'];
        $this->validate($request,$campos,$mensaje);}

        $datosProductos = request()->except(['_token','_method']);

        if($request-> hasFile('Imagen')){
            $productos=producto::findOrFail($id);
            Storage::delete('public/'.$productos->Imagen);
            $datosProductos['Imagen']=$request->file('Imagen')->store('ulpoads','public');
        }

        producto::where('id','=',$id)->update($datosProductos);
        $productos=producto::findOrFail($id);
        //return view('productos.edit', compact('productos'));
        return redirect('productos')->with('mensaje','producto modificado');
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
      return redirect('productos')->with('mensaje','producto borrado');
    }
}
