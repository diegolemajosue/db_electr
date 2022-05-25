

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="card" style="border: solid 1px black;">
<div class="card-heade">
    Reportes
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
</div>


