@extends('admin.layout.mainlayout')
@section('title', 'Donation Prove')
@section('content')
<link rel="stylesheet" href="{{asset('/')}}admin-assets/bundles/chocolat/dist/css/chocolat.css">
<div class="row">
  <div class="col-12 col-sm-12 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4>Donation prove</h4>
      </div>
      <div class="card-body">
      	@foreach($users as $key => $user)
			@if($user->id==$proves->donor_id)
	            <h4>Donor Name: {{$user->name}}</h4>
    		@endif
    		@if($user->id==$proves->recevier_id)
    			<h4>Receiver Name: {{$user->name}}</h4>
        	@endif
        @endforeach
      	<h5>Donated date: {{$proves->donated_date}}</h5>
        <div class="mb-2 text-muted">{{$proves->prove_comment}}</div>
        <div class="chocolat-parent">
          <a href="{{asset('/')}}{{$proves->prove_image}}" class="chocolat-image" title="Just an example">
            <div>
            	<center>
            		<img alt="image" src="{{asset('/')}}{{$proves->prove_image}}" class="img-fluid" style="width: 100%; max-width: 720px;">
            	</center>              
            </div>
          </a>
        </div>
      </div>
      	<div class="card-footer">
      		<center>
      			<a href="{{asset('/')}}admin/donation-prove-accept/{{$proves->id}}/{{$proves->donor_id}}"  class="btn btn-success">Accept</a>
				<a href="{{asset('/')}}admin/donation-prove-reject/{{$proves->id}}/{{$proves->donor_id}}"  class="btn btn-danger">Reject</a>
      		</center>					      
	    </div>
    </div>
  </div>
</div>
@endsection