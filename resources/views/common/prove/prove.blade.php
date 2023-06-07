@extends('layouts.common.layout')
@section('title', 'Donated List')
@section('content')
<div id="titlebar" class="dashboard_gradient">
<div class="row">
  <div class="col-md-12">
    <h2>Donated List</h2>
    <nav id="breadcrumbs">
      <ul>
        <li><a href="{{asset('/')}}">Home</a></li>
        <li><a href="{{asset('/')}}dashboard">Canvas</a></li>
        <li>Donated List</li>
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
        @if(count($proves))
        <thead>
          <tr>
            <th>SL</th>
            <th>Description</th>
            <th class="hide_767_text">Blood Group</th>
            <th class="hide_767_text">Donated Date</th>
          </tr>
        </thead>
        @endif
        <tbody>
          @if(!count($proves))
          <center>No Request found</center>
          @endif
          <?php $index=0;?>
          @foreach($proves as $key=> $my_req )
          <tr>
            <td>{{$index + $proves->firstItem()}}</td>
            <?php $index++;?>
            <td>
              <span class="hide_767_text">
                <strong>{{$my_req->name}}</strong>
                <br>Email: {{$my_req->email}}
                @if($my_req->phonestatus==1)
                <br>Phone: {{$my_req->phone}}
                @endif
              </span> 
              <span class="show_767_text" onclick="document.getElementById('desc_popup{{$my_req->id}}').style.display='block'"><i class="fa fa-eye"></i> View</span>
            </td>
            <td class="hide_767_text">{{$my_req->blood_group}}</td>
            <td class="hide_767_text">{{date("d M Y", strtotime($my_req->donated_date))}}</td>
          </tr>

          <center>
            <div class="description-popup" id="desc_popup{{$my_req->id}}">
              <label style="float: right;  margin: 5px;  margin-top: 0px;" onclick="document.getElementById('desc_popup{{$my_req->id}}').style.display='none'"><i class="fa fa-close"></i>
              </label>
                <strong>{{$my_req->name}}</strong>
                <br>Email: {{$my_req->email}}
                @if($my_req->phonestatus==1)
                <br>Phone: {{$my_req->phone}}
                @endif
                Blood Group: {{$my_req->blood_group}}
                Donated Date: {{date("d M Y", strtotime($my_req->donated_date))}}<br>
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
        <li><a href="{{$proves->previousPageUrl()}}"><i class="sl sl-icon-arrow-left"></i></a></li>
        @if($proves->currentPage()!=1)
        <li><a href="{{$proves->previousPageUrl()}}">{{$proves->currentPage()-1}}</a></li>
        @endif
        <li><a href="#" class="current-page">{{$proves->currentPage()}}</a></li>
        @if($proves->currentPage()!=$proves->lastPage())
        <li><a href="{{$proves->nextPageUrl()}}">{{$proves->currentPage()+1}}</a></li>
        @endif
        <li><a href="{{$proves->nextPageUrl()}}"><i class="sl sl-icon-arrow-right"></i></a></li>
      </ul>
    </nav>
  </div>
</div>
@endsection