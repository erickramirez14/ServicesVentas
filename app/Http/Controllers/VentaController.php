<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use Carbon\Carbon;
use DB;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $venta = Venta::join('usuario', 'usuario.u_clave', '=', 'venta.u_clave')
            ->get(['v_clave', 'u_alias', 'v_fecha', 'v_estado']);

        return response()->json([
            "success" => true,
            "data" => $venta
        ]);
    }

    public function obtenerByID($id)
    {
        $venta = Venta::join('usuario', 'usuario.u_clave', '=', 'venta.u_clave')
            ->where('v_clave', '=', $id)
            ->get(['v_clave', 'u_alias', 'v_fecha', 'v_estado']);
        return response()->json([
            "success" => true,
            "data" => $venta
        ]);
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
        $venta = new Venta();
        $venta->v_estado = $request-> v_estado;
        $venta->u_clave = $request-> u_clave;
        $today = Carbon::createFromFormat('d/m/Y',  $request-> v_fecha);
        $venta->v_fecha = $today;

        $venta->save();

        return response()->json([
            "success" => true,
            "message" => "La venta se ha insertado exitosamente",
            "data" => $venta->id
        ]);
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
    public function update(Request $request, $id)
    {
        $venta = Venta::where('v_clave', '=', $id)->update($request->all());

        return response()->json([
            "success" => true,
            "message" => "La venta se ha actualizado exitosamente",
            "data" => $id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
