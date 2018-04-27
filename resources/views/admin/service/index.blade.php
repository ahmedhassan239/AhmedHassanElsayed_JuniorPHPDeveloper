@extends('admin.layout.master')

@section('title')
    Add Clint
@endsection
@section('header')

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.1.0/jquery-confirm.min.css">

@endsection



@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Services table</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="services" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class='no-sort'>#</th>
                                <th class='no-sort'>Title</th>
                                <th class='no-sort'>Type</th>
                                <th class='no-sort'>Link</th>
                                <th class='no-sort'>Description</th>
                                <th class='no-sort'>Controle</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Link</th>
                                <th>Description</th>
                                <th>Controle</th> 
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

@endsection



@section('footer')

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#services').DataTable({
        "processing": true,
        "serverSide": true,
        "searching": false,
        "ajax": {
             'url':"/root/service/data",
             'type': 'POST',
             'beforeSend': function (request) {
                    request.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
                }
         },
        "ordering": false
    });
});
</script>
@endsection