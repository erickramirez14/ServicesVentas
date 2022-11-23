<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VentaDetalle;
use DB;

class VentaDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function obtenerByID($id)
    {
        $detalle = VentaDetalle::join('producto', 'detalle_venta.p_clave', '=', 'producto.p_clave')
            ->join('venta', 'detalle_venta.v_clave', '=', 'venta.v_clave')
            ->where('detalle_venta.v_clave', '=', $id)
            ->get(['detalle_venta.v_clave', 'p_nombre', 'detalle_venta.p_cantidad', 'detalle_venta.p_costo']);
        return response()->json([$detalle]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $detalle = new VentaDetalle();
        $detalle->v_clave = $request-> v_clave;
        $detalle->p_clave = $request-> p_clave;
        $detalle->p_cantidad = $request-> p_cantidad;
        $detalle->p_costo = $request-> p_costo;

        $detalle->save();

        return response()->json(['message' => 'Detalle de Venta guardada correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $v_clave = $request-> v_clave;
        $p_clave = $request-> p_clave;

        $detalle = VentaDetalle::where([
                ['v_clave', '=', $v_clave],
                ['p_clave', '=', $p_clave]
                ])
                ->update($request->all());
        
        return response()->json(['message' => 'Detalle de Venta actualizada correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $v_clave = $request-> v_clave;
        $p_clave = $request-> p_clave;
        $detalle = VentaDetalle::where([
                ['v_clave', '=', $v_clave],
                ['p_clave', '=', $p_clave]
            ])
            ->delete();

            return response()->json(['message' => 'Detalle de Venta eliminado correctamente']);
    }
}
