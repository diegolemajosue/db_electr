@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="border: solid 1px black;">


<div class="card-header bg-dark">

    <h4 class=" text-white ">Inventario</h4>
</div>
<div class="card-body">

    <form action="{{route('inventario.update',$inventario->inv_id)}}" method="POST" onsubmit="return validar()">
        @csrf

        
                    <div class="form-group row">
                        
                        <label for="pro_id" class="col-md-4 col-form-label text-md-right">Producto</label>
                        <div class="col-md-6">
                            <select name="prod_id" class="form-control" id="validationCustom04" required>
                                <!-- <option selected disabled>Elija un Producto</option> -->
                                @foreach($productos as $prod)
                                @if($prod->prod_id==$inventario->prod_id)
                                <option selected value="{{$prod->prod_id}}">{{$prod->prod_nombre}}</option>
                                @else
                                <option  value="{{$prod->prod_id}}">{{$prod->prod_nombre}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    
                    <div class="form-group row">
                        
                        <label for="prov_id" class="col-md-4 col-form-label text-md-right">Provedor</label>
                        <div class="col-md-6">
                            <select name="prov_id" class="form-control" id="validationCustom04" required>
                                <option selected disabled>Elija un Provedor</option>
                                @foreach($provedor as $prov)
                                @if($prov->prov_id==$inventario->prov_id)
                                <option selected value="{{$prov->prov_id}}">{{$prov->prov_nombre}} - Tel:{{$prov->prov_telefono}}</option>
                                @else
                                <option value="{{$prov->prov_id}}">{{$prov->prov_nombre}} - Tel:{{$prov->prov_telefono}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        
                        <label for="pro_id" class="col-md-4 col-form-label text-md-right">Bodega</label>
                        <div class="col-md-6">
                            <select name="bod_id" class="form-control" id="validationCustom04" required>
                                <option selected disabled>Elija una Bodega</option>
                                @foreach($bodega as $bod)
                                @if($bod->bod_id==$inventario->bod_id)
                                <option selected value="{{$bod->bod_id}}">{{$bod->bod_nombre}} </option>
                                @else
                                <option selected value="{{$bod->bod_id}}">{{$bod->bod_nombre}} </option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    
                    
                    
                    <div class="form-group row">
                        <label for="inv_cantidad" class="col-md-4 col-form-label text-md-right">Cantidad</label>
                        <div class="col-md-6">
                           
                            <input id="inv_cantidad" name="oldcantidad" readonly type="number" value="{{$inventario->inv_cantidad}}" name="inv_cantidad" type="number"  class="form-control @error('inv_cantidad') is-invalid @enderror" name="inv_cantidad" value="{{ old('inv_cantidad') }}" required autocomplete="inv_cantidad">
                            @error('inv_cantidad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inv_cantidad" class="col-md-4 col-form-label text-md-right">Añadir Cantidad</label>
                        <div class="col-md-6">
                            <?php
                            $inv_cantidad=$inventario->inv_cantidad;
                            ?>
                            <input id="inv_cantidad" name="inv_cantidad"  type="number" value="0" name="inv_cantidad" type="number"  class="form-control @error('inv_cantidad') is-invalid @enderror" name="inv_cantidad" value="{{ old('inv_cantidad') }}" required autocomplete="inv_cantidad">
                            @error('inv_cantidad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    
                    
                    
                    
                    <button class="btn " style="margin-left: 55%;background:#1ab7a1;">Guardar</button>
                    
                    
                </form>
                
            </div>
            </div>
        </div>
    </div>
</div>

@endsection