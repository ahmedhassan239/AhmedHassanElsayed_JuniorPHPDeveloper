@extends('admin.layout.master')

@section('title')
   Client Data
@endsection
@section('header')
    <style type="text/css">
        .error{color:#F00;}
    </style>  
@endsection
@section('content')
@include('admin/layout/messages')
<div class="box-body">
    <table id="clients" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th class='no-sort'>#</th>
            <th class='no-sort'>title</th>
            <th class='no-sort'>description</th>
            <th class='no-sort'>status</th>
            <th class='no-sort'>contact Phone</th>
            <th class='no-sort'>contract Start Date</th>
            <th class='no-sort'> contract End Date</th>
        </tr>
        </thead>
        <tfoot>
       	<tr>
            <th>{{$client->id}}</th>
            <th>{{$client->title}}</th>
            <th>{{$client->description}}</th>
            <th>{{$client->status}}</th>
            <th>{{$client->contactPhone}}</th>
            <th>{{$client->contractStartDate}}</th>
            <th>{{$client->contractEndDate}}</th>
        </tr>
        
        </tfoot>
    </table>
</div><br>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">+Service</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/root/service/add" method="post" id="service-form">
        	{{ csrf_field() }}
          <div class="form-group">
            <label for="recipient-name" class="col-form-label"> Service Title</label>
            <input type="text" name="title" class="form-control" id="title">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Service Type</label>
            <input type="text" name="type" class="form-control" id="type">
          </div>
        
          <div class="form-group">
            <label for="message-text" class="col-form-label">Service Link</label>
            <input type="text" name="link" class="form-control" id="link">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Service Description</label>
            <textarea name="description" class="form-control" id="description"></textarea>
          </div>
      	     <input type="hidden" name="client_id" id="client_id" value="{{$client->id}}">
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Submit</button>
		      </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@section('footer')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#service-form").validate({
            rules: {
                title: {
                      required: true,
                    
                      },
                description: {
                      required: true,
                     
                      },

                type: {
                        required: true,
                       
                      },
                link: {
                        required: true,
                        url: true
                    },
                client_id:{
                        required: true,
                    },
                                
            }
        });
    });
</script>
@endsection