@extends('dashboard/layout/master')
@section('content')
	

<div class="main-panel">
	<div class="content-wrapper">
	  <div class="row">
		
		<div class="col-lg-12 grid-margin stretch-card">
		  <div class="card">
			<div class="card-body">
			  <h4 class="card-title">Manage User</h4>
				<a href="{{route('user.create')}}"> 
				<button class="btn btn-outline-success btn-fw">
					Add User
			  </button>
			</a>
			<a href="{{route('home')}}"> 
				<button class="btn btn-outline-success btn-fw">
					Back to Home
			  </button>
			</a>
			
			  <div class="table-responsive">
				<table class="table table-striped">
				  <thead>
					<tr>
					  <th>
						User
					  </th>
					  <th>
						Name
					  </th>
					  <th>
						Email
					  </th>
					  <th>
						Phone
					  </th>
					  <th>
					  Birthdate
					  </th>
					  
					  <th>
						SignUp Date
					  </th>
					  <th>
						Setting
					  </th>
					</tr>
				  </thead>
				  <tbody>
					  @foreach ($users as $user)
						  
					<tr>
					  <td class="py-1">
						@if ($user->user_img == null)
						<img src="{{asset('./uploads/user2.png')}}" alt="No image"/>
						@else
						<img src="{{asset($user->user_img)}}" alt="image"/>
						@endif
						{{-- <img src="{{asset($user->user_img)}}" alt="image"/> --}}
					  </td>
					  <td>
						{{$user->name}}
					  </td>
					  <td>
						{{$user->email}}
					  </td>
					  <td>
						{{$user->phone}}
					  </td>
					  <td>
						{{$user->birthdate}}
					  </td>
					  <td>
						{{$user->created_at}}
					  </td>
					  <td>
						<div class="cont-icon">
							<a href="{{route('user.edit', $user->id)}}"><i class="mdi mdi-lead-pencil iconStyle iconE"></i></a>
						</div> 
						<div class="cont-icon">
							<a style="color:blue;font-size:25px;" href="{{route('userhavetransaction', $user->id)}}"> +</a>
						</div>
						

						<form action="{{route('user.destroy',$user->id)}}" method="post">

								@csrf
								@method('Delete')
							<button data-toggle="tooltip" title="Trash" class="trashIcon"><i class="mdi mdi-delete-forever iconStyle iconeD"></i></button>
							</form>


						{{-- <a href="{{route('user.destroy', $user->id)}}"><i class="mdi mdi-delete-forever iconStyle iconeD"></i></a> --}}

					  </td>
					</tr>

					@endforeach

				  </tbody>
				</table>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>



@endsection
