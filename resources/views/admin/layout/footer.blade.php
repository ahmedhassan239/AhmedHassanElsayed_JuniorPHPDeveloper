	<footer class="main-footer">
	<div class="pull-right hidden-xs">
	  <b>Version</b> 2.4.0
	</div>
	<strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
	reserved.
</footer>

</div>
./wrapper

jQuery 3
<script src="/admin/bower_components/jquery/dist/jquery.min.js"></script>
jQuery UI 1.11.4
<script src="/admin/bower_components/jquery-ui/jquery-ui.min.js"></script>
Resolve conflict in jQuery UI tooltip with Bootstrap tooltip
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
Bootstrap 3.3.7
<script src="/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
Slimscroll
<script src="/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
FastClick
<script src="/admin/bower_components/fastclick/lib/fastclick.js"></script>
AdminLTE App
<script src="/admin/dist/js/adminlte.min.js"></script>
@yield('footer')
</body>
</html>