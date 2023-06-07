@extends('admin.layout.mainlayout')
@section('title', 'Donation Proves')
@section('content')
<link rel="stylesheet" href="{{asset('/')}}admin-assets/bundles/datatables/datatables.min.css">

<div class="row">
	<div class="col-12">
		<div class="card">
		  <div class="card-header">
		    <h4>Donation Proves</h4>
		  </div>
		  <div class="card-body">
		    <div class="table-responsive">
		      <table class="table table-striped" id="table-1">
		        <thead>
		          <tr>
		            <th class="text-center">
		              	Serial
		            </th>
		            <th class="text-center">
		            	Donor
		        	</th>
		            <th class="text-center">
		            	Receiver
		            </th>		            
		            <th class="text-center">
		            	Date
		            </th>
		            <th  class="text-center">
		            	Action
		            </th>
		          </tr>
		        </thead>
		        <tbody>

		          @foreach($proves as $key => $prove)
			        <tr>
			            <td class="text-center">
			              {{$key+1}}
			            </td>
						@foreach($users as $key => $user)
							@if($user->id==$prove->donor_id)
					            <td class="text-center">
					            	{{$user->name}}
					        	</td>
			        		@endif
			        		@if($user->id==$prove->recevier_id)
			            		<td class="text-center">
			            			{{$user->name}}
			            		</td>
			            	@endif
			            @endforeach
			            <td class="text-center">
			            	{{date('d M Y', strtotime($prove->donated_date));}}
			            </td>			            
			            <td class="text-center">
			            	<a href="{{asset('/')}}admin/prove-view/{{$prove->id}}" class="btn btn-primary">View & Action</a>
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

@endsection