@extends('layouts.app') 
@section('content')
<div class="container">
	 <div class="row justify-content-center">
	 	<div class="col-md-8">
	 		<div class="card" style="border: solid 1px black;">
<div class="card-header bg-dark">

    <h4 class=" text-white ">Editar Bodegas </h4>
</div>
<div class="card-body">

    <form action="{{route('bodegas.update',$bodegas->bod_id)}}" method="POST" >  
        @csrf

 						<div class="form-group row">
                            <label for="bod_nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{$bodegas->bod_nombre}}" name="bod_nombre"   class="form-control @error('bod_nombre') is-invalid @enderror" name="bod_nombre" value="{{ old('bod_nombre') }}" required autocomplete="bod_nombre">
                                @error('bod_nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        
                        
                        <button class="btn btn-success" style="margin-left: 40%;">Guardar</button>
                        
                    </form>
                </div>
</div>
</div>
</div>
</div>

@endsection