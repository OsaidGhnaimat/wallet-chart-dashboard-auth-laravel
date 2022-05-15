@extends('dashboard/layout/master')
@section('content')
	

<div class="main-panel">
	<div class="content-wrapper">
	  <div class="row">
		
		
		<div class="col-lg-12 grid-margin stretch-card">
		  <div class="card">
			<div class="card-body">
			  <h4 class="card-title">Manage User</h4>
			
			  <div class="table-responsive">
				<table class="table table-striped">
				  <thead>
					<tr>
					
                      <th>
					  Total expenses
					  </th>
                      <th>
					  Total income
					  </th>
					
					</tr>
				  </thead>
				  <tbody>
						  
					<tr>
				
					  <td>
						{{$total_expense}}
					  </td>
					  <td>
						{{$total_income}}
					  </td>
					
					</tr>


				  </tbody>
				</table>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>



@endsection
