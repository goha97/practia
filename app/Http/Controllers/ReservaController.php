<?php

namespace App\Http\Controllers;

use App\Models\reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datos['reservas']=reserva::paginate(5);
        return view('reserva.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reserva.create');
        //
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
            'Rut'=>'required|string|max:100',
            'Nombre'=>'required|string|max:100',
            'Apellido'=>'required|string|max:100',
            'Producto'=>'required|string|max:100',

        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',

        ];
        $this->validate($request,$campos,$mensaje);
        //R
        $datosReserva = request()->except('_token');

        reserva::insert($datosReserva);
      //  return response()->json($datosProductos);
       return redirect('reservas')->with ('mensaje','se ha agregado con exito');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function show(reserva $reserva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reserva=reserva::findOrFail($id);
        return view('reservas.edit', compact('reservas'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'Rut'=>'required|string|max:100',
            'Nombre'=>'required|string|max:100',
            'Apellido'=>'required|string|max:100',
           // 'Producto'=>'required|string|max:100',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',

        ];

        $datosReserva = request()->except(['_token','_method']);



        reserva::where('id','=',$id)->update($datosReserva);
        $productos=reserva::findOrFail($id);

        return redirect('reserva')->with('mensaje','reserva modificada');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserva=reserva::findOrFail($id);

            reserva::destroy($id);

        return redirect('reserva');
      return redirect('reserva')->with('mensaje','producto borrado');
        //
    }
}
