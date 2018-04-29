@if (Session::has('success'))
	<div class="alert alert-success" role="alert" id="alert">
  		<strong>Success: </strong> {{Session::get('success')}}
	</div>
@endif
<script src="/admin/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
	$('div.alert').delay(2000).slideUp(200);
</script>