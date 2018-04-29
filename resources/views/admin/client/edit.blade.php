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
    @include('admin/layout/messages')
    <div class="row">
        <legend>Client Update Form</legend>
        <form method="post" action="/root/client/update/" id="update-client-form">
            <input name="_method" type="hidden" value="PATCH">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="Client Title">Client Title</label>
                <input type="text" class="form-control"  name="title"  id="title"  value="{{$client->title}}"  placeholder="Enter Client Title">
            </div>   
       
            <div class="form-group">
                <label for="Client status">Client Status</label>
                <input type="text" class="form-control"  name="status"  id="status"  value="{{$client->status}}" placeholder="Enter Client status">
            </div>   

            <div class="form-group">
                <label for="Client contactPhone">Client contact Phone</label>
                <input type="text" class="form-control"  name="contactPhone"  value="{{$client->contactPhone}}" id="contactPhone"  placeholder="Enter contact Phone">
            </div>   

            <input type="hidden" name="id" value="{{$client->id}}">

            <div class="form-group">
                <label>Client Contract Start Date</label>
                <input type="date" class="form-control"  value="{{$client->contractStartDate}}" name="contractStartDate"  id="contractStartDate">
            </div>   

            <div class="form-group">
                <label>Client Contract End Date</label>
                <input type="date" class="form-control"  name="contractEndDate"  value="{{$client->contractEndDate}}" id="contractEndDate">
            </div>  


            <div class="form-group">
                <label for="Client description">Client Description</label>
                <textarea class="form-control"  name="description"  id="description" placeholder="Enter Client description"> {{$client->description}} </textarea>
            </div>

            @foreach ($channels as $channel)
                 <label class="checkbox-inline">
                    <input type="checkbox" name="channels[]" value="{{$channel->id}}" 
                        @if ($client->haveChannel($channel->id))
                            checked="" 
                        @endif
                    >{{$channel->channel_name}}
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
        $("#update-client-form").validate({
            rules: {
               channel_name: "required",
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