@extends('layouts.app')
@section('content')
<?php
if(isset($prod_id)){

    $prod_id=$prod_id;
}else{
    $prod_id="";
}
if(isset($prov_id)){

    $prov_id=$prov_id;
}else{
    $prov_id="";
}
if(isset($bod_id)){

    $bod_id=$bod_id;
}else{
    $bod_id="";
}
?>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="card" style="border: solid 1px black;">
<form action="{{route('reporte.reporte')}}" method="POST">
    @csrf
    <div class="card-header bg-dark ">
        
                    <div class="row">

                        
                        <h4 class="text-white ">Reportes</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-3 text-white">Producto:</div>
                        <div class="col-md-3 text-white">Provedor:</div>
                        <div class="col-md-3 text-white">Categoria:</div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            
                            <select name="prod_id" id="prod_id" class="form-control">
                                <option value="">Selecciones un producto</option>
                                @foreach($productos as $prod)
                                @if($prod_id==$prod->prod_id)
                                <option selected value="{{$prod->prod_id}}">{{$prod->prod_nombre}}</option>
                                @else
                                <option  value="{{$prod->prod_id}}">{{$prod->prod_nombre}}</option>
                                @endif
                                
                                @endforeach    
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="prov_id" id="prov_id" class="form-control">
                                <option value="">Selecciones un Proveedor</option>
                                @foreach($provedor as $prov)
                                @if($prov_id==$prov->prov_id)
                                <option selected value="{{$prov->prov_id}}">{{$prov->prov_nombre}} - {{$prov->prov_telefono}}</option>
                                @else
                                <option value="{{$prov->prov_id}}">{{$prov->prov_nombre}} - {{$prov->prov_telefono}}</option>
                                @endif
                                
                                @endforeach    
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="bod_id" id="bod_id" class="form-control">
                                <option value="">Selecciones una Categoria</option>
                                
                                @foreach($bodegas as $bod)
                                @if($bod_id==$bod->bod_id)
                                <option selected value="{{$bod->bod_id}}">{{$bod->bod_nombre}} </option>
                                @else
                                <option  value="{{$bod->bod_id}}">{{$bod->bod_nombre}} </option>
                                @endif
                                
                                @endforeach    
                            </select>
                        </div>
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-danger">Buscar</button>
                        </div>
                        <div class="col-md-1">
                            <button type="submit" name="btn_pdf" value="0" class="btn btn-primary">PDF</button>
                        </div>
                    </div>
                </form>


                </div>
                <div class="card-body">
                    
                   <table class="table table-striped">
<th>Producto</th>
<th>Codigo</th>
<th>Stock</th>
<th>Precio</th>
<th>Categoria</th>
<th>Provedor</th>
@isset($reporte)
@foreach($reporte as $rep)

<tr>
    <td>{{$rep->prod_nombre}}</td>
    <td>{{$rep->prod_codigo}}</td>
    <td>{{$rep->inv_cantidad}}</td>
    <td>${{$rep->prod_precio}}</td>
    <td>{{$rep->bod_nombre}}</td>
    <td>{{$rep->prov_nombre}}</td>
</tr>
@endforeach
@endisset
                   </table>
                    </div>
                </div>
            </div>

		</div>
	</div>
</div>


@endsection