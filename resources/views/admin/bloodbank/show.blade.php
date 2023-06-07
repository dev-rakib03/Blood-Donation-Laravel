@extends('admin.layout.mainlayout')
@section('title', 'All Blood Bank')
@section('content')
<link rel="stylesheet" href="{{asset('/')}}admin-assets/bundles/datatables/datatables.min.css">

<div class="row">
	<div class="col-12">
		<div class="card">
		  <div class="card-header">
		    <h4>All Blood Bank</h4>
		    <div class="card-header-action">
	            <a href="{{asset('/')}}admin/add-user" class="btn btn-primary">Add Blood Bank</a>
	        </div>
		  </div>
			  
		  <div class="card-body">
		    <div class="table-responsive">
		      <table class="table table-striped" id="table-1">
		        <thead>
		          <tr>
		            <th class="text-center">Serial</th>
		            <th class="text-center">Name</th>
		            <th class="text-center">Profile Image</th>
		            <th class="text-center">Phone</th>
		            <th class="text-center">Join Date</th>
		            @if(Auth::user()->role_id==1)
		            <th class="text-center">Action</th>
		            @endif
		          </tr>
		        </thead>
		        <tbody>

		        	@foreach($users as $key => $user)
			        <tr>
			            <td class="text-center">
			              {{$key+1}}
			            </td>
			            <td class="text-center">
			            	{{$user->name}}
			        	</td>
			            <td class="text-center">
			            	<?php
					            $imahepath=$user->profile_photo_path;            
					            $imagename=$user->name;
					            if ($imahepath) {
					               $profile_photo_path=asset('/').$imahepath;
					            }
					            else{
					                $profile_photo_path='https://ui-avatars.com/api/?name='.urlencode($imagename).'&color=7F9CF5&background=EBF4FF';
					            }
					        ?>
			              	<img alt="image" src="{{$profile_photo_path}}" style="height: 50px; width: 50px; object-fit: cover;">
			            </td>
			            <td class="text-center">
			              {{$user->phone}}
			            </td>			            
			            <td class="text-center">
			            	{{date('d M Y', strtotime($user->created_at));}}
			        	</td>
			        	@if(Auth::user()->role_id==1)
			            <td class="text-center">
			            	<a href="{{asset('/')}}admin/user-profile/{{$user->id}}" class="btn btn-primary">Profile</a>
			            </td>
			            @endif
			        </tr>
		          	@endforeach

		        </tbody>
		      </table>
		    </div>
		  </div>
		</div>
	</div>
</div>

@endsection