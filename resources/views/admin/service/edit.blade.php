@extends('admin.layout.master')

@section('title')
    Edit Clint
@endsection
@section('header')
    <style type="text/css">.error{color:#F00;}
</style>
@endsection
@section('content')
	<div class="container">
		<div class="row">
			<form action="/root/service/update" method="post" id="update-service-form">
	        	{{ csrf_field() }}
	          <div class="form-group">
	            <label for="recipient-name" class="col-form-label"> Service Title</label>
	            <input type="text" name="title" class="form-control" id="title" value="{{$service->title}}">
	          </div>
	          <div class="form-group">
	            <label for="message-text" class="col-form-label">Service Type</label>
	            <input type="text" name="type" class="form-control" id="type" value="{{$service->type}}">
	          </div>
	        
	          <div class="form-group">
	            <label for="message-text" class="col-form-label">Service Link</label>
	            <input type="text" name="link" class="form-control" id="link" value="{{$service->link}}">
	          </div>
	          <div class="form-group">
	            <label for="message-text" class="col-form-label">Service Description</label>
	            <textarea name="description" class="form-control" id="description" >{{$service->description}}</textarea>
	          </div>
	      	      <input type="hidden" name="id" id="id" value="{{$service->id}}">
			      <div class="modal-footer">
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
        $("#update-service-form").validate({
            rules: {
               // compound rule
                title: {
                      required: true,
                      
                      },
                
                type: {
                        required: true,
                        
                      },
                link: {
                        required: true,
                        url: true
                    },
                description: {
                      required: true,
                      lettersonly: true
                      },   
            }
        });
    });
</script>
@endsection