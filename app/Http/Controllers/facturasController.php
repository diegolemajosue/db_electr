<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facturas;
use App\Detalle;
use DB;
use PDF;
class facturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $facturas=DB::select("select * from facturas join provedor on facturas.prov_id=provedor.prov_id");
        return view('facturas.index')
        ->with('facturas',$facturas)
        ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $provedor=DB::select("SELECT * from provedor");
        // $productos=DB::select("SELECT * from producto");
        return view('facturas.create')
        ->with('provedor',$provedor)
        // ->with('productos',$productos)
        ;
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
        $data=$request->all();
        $factura=Facturas::create($data);
        return redirect(route('facturas.edit',$factura->fac_id));

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
        $factura=Facturas::find($id);
        $provedor=DB::select("SELECT * from provedor");
        // $productos=DB::select("SELECT * from producto");
        $detalle=DB::select("SELECT * FROM facturas_detalle fd 
                             
                             WHERE fd.fac_id=$id");
        return view('facturas.edit')
        ->with('factura',$factura)
        ->with('provedor',$provedor)
        ->with('detalle',$detalle)
        ;
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

    public function detalle(Request $req){
         $datos=$req->all();
         $fac_id=$datos['fac_id'];
         
         if(isset($datos['btn_detalle'])=='btn_detalle'){
                ///GUARDO EL DETALLE 
           Detalle::create($datos);
         }
         if(isset($datos['btn_eliminar'])>0){
                ///ELIMINO EL DETALLE    
                $fad_id=$datos['btn_eliminar'];
                Detalle::destroy($fad_id);    

         }
       return redirect(route('facturas.edit',$fac_id));
    }

    public function facturas_pdf($fac_id){
        
        $factura=DB::select("
            SELECT * FROM facturas f
            JOIN provedor p ON p.prov_id=f.prov_id
            WHERE f.fac_id=$fac_id ");

        $detalle=DB::select("SELECT * FROM facturas_detalle d 
                  
                   WHERE d.fac_id=$fac_id 
            ");

        $pdf = PDF::loadView('facturas.pdf',[ 'factura'=>$factura[0],'detalle'=>$detalle ]);
        return $pdf->stream('factura.pdf');




    }


}
