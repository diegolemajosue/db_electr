<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Inventario;
use App\Productos;
use App\Bodega;
use App\Provedor;
use App\Ventas;
use DB;
use Auth;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $inventario=Inventario::all();
        
  $inventario=DB::Select("Select * FROM inventario i join productos prod on i.prod_id=prod.prod_id join provedor prov on i.prov_id=prov.prov_id join bodega b on i.bod_id=b.bod_id");
        return view('inventario.index')
        ->with('inventario',$inventario)
        ;
    }
    public function search(Request $request){
        $data=$request->all();
        $prod_nombre=$data['prod_nombre'];
        
        $inventario=DB::select("Select * FROM inventario i join productos prod on i.prod_id=prod.prod_id join provedor prov on i.prov_id=prov.prov_id join bodega b on i.bod_id=b.bod_id
        WHERE  prod_nombre LIKE '$prod_nombre %' OR prod_nombre LIKE	'%$prod_nombre%' OR prod_nombre LIKE	'% $prod_nombre' ");
        return view('inventario.index')->with('inventario',$inventario);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos=productos::all();
        $provedor=provedor::all();
        $bodega=bodega::all();
        return view('inventario.create')->with('productos',$productos)->with('provedor',$provedor)->with('bodega',$bodega);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        //$data['password']=bcrypt($data['password']);
   
        Inventario::create($data);
        
        return redirect(route('inventario'));
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
        $inventario=Inventario::find($id);
        $productos=productos::all();
        $provedor=provedor::all();
        $bodega=bodega::all();
        return view('inventario.edit')->with('inventario',$inventario)->with('productos',$productos)->with('provedor',$provedor)->with('bodega',$bodega);
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
        $data=$request->all();
        $oldcantidad=$data['oldcantidad'];
        $inv_cantidad=$data['inv_cantidad'];
        $inv_cantidad=$oldcantidad+$inv_cantidad;
        $data['inv_cantidad']="$inv_cantidad";
      
        $inv=inventario::find($id);
        $inv->update($data);
         return redirect(route('inventario'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Inventario::destroy($id);
        return redirect(route('inventario'));
    }
}
