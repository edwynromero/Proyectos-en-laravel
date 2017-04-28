@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="page-header">
			Comprobantes
			</h2>
		<table class="table-striped">
			<thead>
				

			<tr>
			<th>Clients</th>	
			<th style="width: 100">Iva</th>
			<th style="width: 160">Sub Total</th>
			<th style="width: 160">Total</th>
			<th style="width: 100">Creado</th>						
			</tr>
%tr.test
	%p
			</thead>
		

		</table>
            </div>
        </div>
  

  </div>
</div>
@endsection
