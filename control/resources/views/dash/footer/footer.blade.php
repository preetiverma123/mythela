<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 2.4.0
  </div>
  <strong>Copyright &copy; 2019-2021 <a href="">Ogonn</a>.</strong> All rights
  reserved.
</footer>
</div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="{{asset('dash-lib/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('dash-lib/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('dash-lib/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('dash-lib/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('dash-lib/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('dash-lib/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dash-lib/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
  $('#manage-account').DataTable({
    'processing': true,
    'serverSide': true,
    'serverMethod':'post',
    'ajax': {
      'url':'{{ route('filter.account') }}',
      'data': function(data){
        data._token = "{{csrf_token()}}";
        data.city_id = $("#select-city option:selected").val();
        data.role_id = $("#select-role option:selected").val();
      }
    },
    'columns': [
        { data: 'id' },
        { data: 'name' },
        { data: 'fullname' },
        { data: 'email' },
        { data: 'mobile' },
        {'mRender':function(data, type, row){
          return '<a class="btn btn-xs btn-primary" href="/dashboard/detail-earning/'+window.btoa(row['id'])+'"><i class="fa fa-eye"></i></a>';}
        }
    ]
  });
  $(document).on('submit', '#apply-filter', function(event){
      event.preventDefault();
      $('#manage-account').DataTable().draw(true);
});
</script>
</body>
</html>