@extends('admin.layout.master')

@section('title')
    Add Clint
@endsection
@section('header')
    <style type="text/css">.error{color:#F00;}
</style>
@endsection
@section('content')    
<div class="container">
    <div class="row">
        <legend>Client Form</legend>
        <form method="POST" action="/root/client/store" id="client-form">
              {{ csrf_field() }}

	        <div class="form-group">
	            <label for="Client Title">Client Title</label>
	            <input type="text" class="form-control"  name="title"  id="title"  placeholder="Enter Client Title">
	        </div>   
	        <div class="form-group">
	            <label for="Client status">Client Status</label>
	            <input type="text" class="form-control"  name="status"  id="status"  placeholder="Enter Client status">
	        </div>   
	        <div class="form-group">
	            <label for="Client contactPhone">Client contact Phone</label>
	            <input type="text" class="form-control"  name="contactPhone"  id="contactPhone"  placeholder="Enter contact Phone">
	        </div>   

	        <div class="form-group">
	            <label>Client Contract Start Date</label>
	            <input type="date" class="form-control"  name="contractStartDate"  id="contractStartDate">
	        </div>   

	        <div class="form-group">
	            <label>Client Contract End Date</label>
	            <input type="date" class="form-control"  name="contractEndDate"  id="contractEndDate">
	        </div>

	        <div class="form-group">
	            <label for="Client description">Client Description</label>
	            <textarea class="form-control"  name="description"  id="description"  placeholder="Enter Client description"></textarea>
	        </div>

            @foreach ($channels as $channel)
                 <label class="checkbox-inline">
                    <input type="checkbox" name="channels[]" value="{{$channel->id}}">{{$channel->channel_name}}
                </label>
            @endforeach
	           	           
	        <div class="form-group"> <br>
	            <button type="submit" class="btn btn-primary">Submit</button>
	        </div>
        </form>
        @include('admin.layout.errors')
    </div>
</div>
@endsection

@section('footer')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
	 	$("#client-form").validate({
	        rules: {
	           channels: "required",
	           // compound rule
	           	title: {
	                  required: true,
	                
	                  },
	          	description: {
	          		  required: true,
	                 
	          		  },

	          	status: {
	          			required: true,
	                  	
	          		  },
	          	contactPhone: {
	          			required: true,
	                	digits: true
	          		},
	          	contractStartDate:{
	          			required: true,
	                	date: true
	          		},
	          	contractEndDate:{
	          			required: true,
	                	date: true
	          		},			  	         
	        }
	 	});
	});
</script>
	
@endsection

