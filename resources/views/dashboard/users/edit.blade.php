@extends('dashboard/layout/master')

@section('content')
	
<div class="main-panel">        
	<div class="content-wrapper">
	  <div class="row">
		
		
		<div class="col-12 grid-margin stretch-card">
		  <div class="card">
			<div class="card-body">
			  <h4 class="card-title">Manage User</h4>
			  
			  <form class="forms-sample" action="{{ route('user.update', $userEdit->id) }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
				  <label for="name">Name</label>
				  <input type="text" value="{{$userEdit->name}}" class="form-control" id="name" name="name" placeholder="name">
				</div>
				<div class="form-group">
				  <label for="email">Email address</label>
				  <input type="text" class="form-control" id="email" name="email" placeholder="Email"
				  value="{{$userEdit->email}}">
				</div>
				<div class="form-group">
				  <label for="balance">balance</label>
				  <input type="number" value="{{$userEdit->balance}}" class="form-control" id="balance" name="balance" placeholder="balance">
				</div>

				<div class="form-group">
				  <label for="phone">Phone</label>
				  <input type="number" value="{{$userEdit->phone}}" class="form-control" id="phone" name="phone" placeholder="phone">
				</div>
				<div class="form-group">
				  <label for="birthdate">birthdate</label>
				  <input type="date" value="{{$userEdit->birthdate}}" class="form-control" id="birthdate" name="birthdate" placeholder="birthdate">
				</div>
				<div class="form-group">
				  <label for="password">Password</label>
				  <input type="password" class="form-control" id="password" name="password" placeholder="Password"
				  value="{{$userEdit->password}}">
				</div>
				
				
				<div class="form-group">
				  <label>File upload</label>
				  <input type="file" name="user_img" class="file-upload-default">
				  <div class="input-group col-xs-12">
					<input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" name="">
					<span class="input-group-append">
					  <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
					</span>
				  </div>
				</div>
				 <input type="hidden" name="role_id" value="1">
				 <input type="hidden" name="_method" value="PUT">

				<button type="submit" name="submit" class="btn btn-primary mr-2">Update</button>
			  </form>
			</div>
		  </div>
		</div>

	  </div>
	</div>


@endsection