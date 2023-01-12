<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title }}</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="{{ url('assets/plugins/fontawesome-free/css/all.min.css') }}">

  <link rel="stylesheet" href="{{ url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">

  <link rel="stylesheet" href="{{ url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

  <link rel="stylesheet" href="{{ url('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

  <link rel="stylesheet" href="{{ url('assets/plugins/datepicker/css/bootstrap-datepicker.min.css') }}">
  
  <link rel="stylesheet" href="{{ url('assets/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">

    @yield('dash')

    
<script src="{{ url('assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ url('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

<script src="{{ url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('aassets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<script src="{{ url('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ url('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ url('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ url('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ url('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script src="{{ url('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<script src="{{ url('assets/plugins/datepicker/js/bootstrap-datepicker.min.js') }}"></script>

<script src="{{ url('assets/dist/js/adminlte.min.js') }}"></script>

<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  $(function () {
    bsCustomFileInput.init();
  });

  $(document).ready(function() {
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
                orientation: 'bottom auto',
                endDate: '0d',
            });
    });

</script>
</body>
</html>
