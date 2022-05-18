@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card" style="border: solid 1px black;">
                <div class="card-header bg-dark">
                <h2 class=" text-white">Crear Nueva Factura</h2>

                </div>
                <div class="card-body">

                    @include('facturas.fields')
                </div>
            </div>
        </div>
    </div>
</div>




@endsection