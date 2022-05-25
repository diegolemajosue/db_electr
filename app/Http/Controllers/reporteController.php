<?php

namespace App\Http\Controllers;

use App\provedor;
use Illuminate\Http\Request;
use App\Productos;
use App\bodega;
use DB;
use PDF;

class reporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos=Productos::all();
        $provedor=provedor::all();
        $bodegas=bodega::all();
        return view('reporte.index')->with('productos',$productos)->with('provedor',$provedor)->with('bodegas',$bodegas);
    }
    public function reporte(Request $request){
        $productos=Productos::all();
        $provedor=provedor::all();
        $bodegas=bodega::all();
        $prod_id="";
        $prov_id="";
        $bod_id="";
        $sql_prod="";
        $sql_prov="";
        $sql_bod="";
        $data=$request->all();
        
        if(isset($data['prod_id'])){
            $prod_id=$data['prod_id'];
         
            $sql_prod="AND prod.prod_id=$prod_id ";
        }
        if(isset($data['prov_id'])){
            $prov_id=$data['prov_id'];
            $sql_prov="AND prov.prov_id=$prov_id ";
        }
        if(isset($data['bod_id'])){
            $bod_id=$data['bod_id'];
            $sql_bod="AND bod.bod_id=$bod_id ";
        }
        
        $reporte=DB::Select("SELECT * FROM inventario inv 
        JOIN productos prod ON inv.prod_id=prod.prod_id
        JOIN provedor prov ON inv.prov_id=prov.prov_id
        JOIN bodega bod ON inv.bod_id=bod.bod_id
        $sql_prod
        $sql_prov
        $sql_bod
        ");
        if(isset($data['btn_pdf'])){
 
            $data=['reporte'=>$reporte];
            $pdf=PDF::loadView('reporte.pdf',$data);
            return $pdf->stream('reporte.pdf');
        }
        return view('reporte.index')
        ->with('productos',$productos)
        ->with('provedor',$provedor)
        ->with('bodegas',$bodegas)
        ->with('reporte',$reporte)
        ->with('prod_id',$prod_id)
        ->with('prov_id',$prov_id)
        ->with('bod_id',$bod_id);

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
        //
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
        //
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
