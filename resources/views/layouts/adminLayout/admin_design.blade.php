<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Mushkey</title>

    <!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/frontend_images/icon.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/frontend_images/icon.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/frontend_images/icon.png') }}">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/core.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/icon-font.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
	{{--  <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/sweetalert2/sweetalert2.css') }}">  --}}
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/style.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>

</head>
<body>
    {{--  <div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="{{ asset('vendors/images/deskapp-logo.svg') }}" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>  --}}


@include('layouts.adminLayout.admin_header')
@include('layouts.adminLayout.admin_sidebar')

@yield('content')

{{--  @include('layouts.adminLayout.admin_footer')  --}}


    <script src="{{ asset('vendors/scripts/core.js') }}"></script>
	<script src="{{ asset('vendors/scripts/script.min.js') }}"></script>
	<script src="{{ asset('vendors/scripts/process.js') }}"></script>
	<script src="{{ asset('vendors/scripts/layout-settings.js') }}"></script>
	<script src="{{ asset('vendors/scripts/matrix.form_validation.js') }}"></script>
	{{--  <script src="{{ asset('src/plugins/apexcharts/apexcharts.min.js') }}"></script>  --}}
	<script src="{{ asset('src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('vendors/scripts/dashboard.js') }}"></script>

    <script src="{{ asset('src/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
	<script src="{{ asset('src/plugins/datatables/js/buttons.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('src/plugins/datatables/js/buttons.print.min.js') }}"></script>
	<script src="{{ asset('src/plugins/datatables/js/buttons.html5.min.js') }}"></script>
	<script src="{{ asset('src/plugins/datatables/js/buttons.flash.min.js') }}"></script>
	<script src="{{ asset('src/plugins/datatables/js/pdfmake.min.js') }}"></script>
	<script src="{{ asset('src/plugins/datatables/js/vfs_fonts.js') }}"></script>

	<!-- Datatable Setting js -->
	<script src="{{ asset('vendors/scripts/datatable-setting.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
	{{--  <script src="{{ asset('src/plugins/sweetalert2/sweetalert2.all.js') }}"></script>
	<script src="{{ asset('src/plugins/sweetalert2/sweet-alert.init.js') }}"></script>  --}}

<script>
  $( function() {
    $( "#dob" ).datepicker({
        dateFormat:'yy-mm-dd'
        });
    });
  </script>



</body>
</html>
