@extends('layouts.common.layout')
@section('title', 'My Requests')
@section('content')
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
<div id="titlebar" class="dashboard_gradient">
<div class="row">
  <div class="col-md-12">
    <h2>My Requests</h2>
    <nav id="breadcrumbs">
      <ul>
        <li><a href="{{asset('/')}}">Home</a></li>
        <li><a href="{{asset('/')}}dashboard">Canvas</a></li>
        <li>My Requests</li>
      </ul>
    </nav>
  </div>
</div>
</div>
<div class="row">
  <div class="col-lg-12 col-md-12">
      <div class="utf_dashboard_list_box table-responsive">
      <h4>My Requests</h4> 
      <div class="dashboard-list-box table-responsive invoices with-icons">
        <table class="table table-hover">
        @if(count($myrequest))
        <thead>
          <tr>
            <th>SL</th>
            <th>Description</th>
            <th class="hide_767_text">Blood Group</th>
            <th class="hide_767_text">Needed Date</th>
            <th class="hide_767_text" style="text-align: center;">Status</th>
            <th>Action</th>
          </tr>
        </thead>
        @endif
        <tbody>
          @if(!count($myrequest))
          <center>No Request found</center>
          @endif
          <?php $index=0;?>
          @foreach($myrequest as $key=> $my_req )
          <tr>
            <td>{{$index + $myrequest->firstItem()}}</td>
            <?php $index++;?>
            <td>
              <span class="hide_767_text">
                <strong>{{$my_req->name}}</strong> requested for blood.
                <br>Email: {{$my_req->email}}
                @if($my_req->phonestatus==1)
                <br>Phone: {{$my_req->phone}}
                @endif
              </span> 
              <span class="show_767_text" onclick="document.getElementById('desc_popup{{$my_req->id}}').style.display='block'"><i class="fa fa-eye"></i> View</span>
            </td>
            <td class="hide_767_text">{{$my_req->blood_group}}</td>
            <td class="hide_767_text">{{date("d M Y", strtotime($my_req->needed_date))}}</td>
            <td class="hide_767_text" style="text-align: center;">
              @if($my_req->status==2)
                <span class="badge badge-pill badge-danger text-uppercase">Pending</span>
              @endif
              @if($my_req->status==1)
                <a href="{{asset('/')}}submit-prove/{{base64_encode($my_req->id)}}" type="button" class="badge badge-pill badge-primary text-uppercase">Submit Prove</a>
              @endif
              @if($my_req->status==0)
                <span class="badge badge-pill badge-canceled text-uppercase">Canceled</span>
              @endif
            </td>
            <td>
              <div style="display: inline-flex; border: none; vertical-align: middle;">
                <span class="chat-image-table" title="massage"><img style="cursor: pointer;" src="{{asset('/')}}frontend/images/chat-icon.png" onclick="window.location='/message/chatbox/{{$my_req->donor_id}}';"></span>&nbsp;
                @if($my_req->status!=1)
                <label onclick="delete_request('{{$my_req->id}}');" class="actionbutton"><i class="fa fa-close"></i></label>
                @endif
              </div>              
            </td>
          </tr>

          <center>
            <div class="description-popup" id="desc_popup{{$my_req->id}}">
              <label style="float: right;  margin: 5px;  margin-top: 0px;" onclick="document.getElementById('desc_popup{{$my_req->id}}').style.display='none'"><i class="fa fa-close"></i>
              </label>
                <strong>{{$my_req->name}}</strong> requested for blood.
                <br>Email: {{$my_req->email}}
                @if($my_req->phonestatus==1)
                <br>Phone: {{$my_req->phone}}
                @endif
                Blood Group: {{$my_req->blood_group}}
                Needed Date: {{date("d M Y", strtotime($my_req->needed_date))}}<br>
                @if($my_req->status==2)
                  <span class="badge badge-pill badge-danger text-uppercase">Pending</span>
                @endif
                @if($my_req->status==1)
                  <a href="{{asset('/')}}submit-prove" type="button" class="badge badge-pill badge-primary text-uppercase">Submit Prove</a>
                @endif
                @if($my_req->status==0)
                  <span class="badge badge-pill badge-canceled text-uppercase">Canceled</span>
                @endif
                <br>
            </div>
          </center>
          
          @endforeach
        </tbody>
        </table>
      </div>
    </div>    
  </div>
  <div class="clearfix"></div>
  <div class="utf_pagination_container_part margin-top-30 margin-bottom-30">
    <nav class="pagination">
      <ul>
        <li><a href="{{$myrequest->previousPageUrl()}}"><i class="sl sl-icon-arrow-left"></i></a></li>
        @if($myrequest->currentPage()!=1)
        <li><a href="{{$myrequest->previousPageUrl()}}">{{$myrequest->currentPage()-1}}</a></li>
        @endif
        <li><a href="#" class="current-page">{{$myrequest->currentPage()}}</a></li>
        @if($myrequest->currentPage()!=$myrequest->lastPage())
        <li><a href="{{$myrequest->nextPageUrl()}}">{{$myrequest->currentPage()+1}}</a></li>
        @endif
        <li><a href="{{$myrequest->nextPageUrl()}}"><i class="sl sl-icon-arrow-right"></i></a></li>
      </ul>
    </nav>
  </div>
</div>
<script type="text/javascript">
  function delete_request(id) { 
    alertify.confirm('Blood Request',"<center><h3>Are you sure?</h3>you want to delete blood request?<center>",
    function(){
      //alertify.success('Ok');
      window.location.href = '{{asset("/")}}delete-blood-request/'+id;
    },
    function(){
      alertify.error('Cancel');
    });
  }
</script>
@endsection