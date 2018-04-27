
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
                        <h3 class="box-title">Clients table</h3>
                    </div>
                    <!-- /.box-header -->
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
                                <th class='no-sort'>Controle</th>
                                <th class='no-sort'>Services</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>title</th>
                                <th>description</th>
                                <th>status</th>
                                <th>contact Phone</th>
                                <th>contract Start Date</th>
                                <th>contract End Date</th>
                                <th>Controle</th>
                                <th>Services</th> 
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
    $('#clients').DataTable({
        "processing": true,
        "serverSide": true,
        "searching": false,
        "ajax": {
             'url':"/root/clients/data",
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