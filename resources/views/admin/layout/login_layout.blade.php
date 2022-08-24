<!doctype html>
<html lang="en" dir="ltr">
  <head>

		@include('admin.includes.head')

	</head>

	<body>

		@yield('content')

		<!-- JQUERY JS -->
		<script src="{{url('zanex/js/jquery.min.js')}}"></script>

		<!-- BOOTSTRAP JS -->
		<script src="{{url('/zanex/plugins/bootstrap/js/popper.min.js')}}"></script>
		<script src="{{url('/zanex/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

		<!-- SPARKLINE JS -->
		<script src="{{url('/zanex/js/jquery.sparkline.min.js')}}"></script>

		<!-- CHART-CIRCLE JS -->
		<script src="{{url('/zanex/js/circle-progress.min.js')}}"></script>

		<!-- Perfect SCROLLBAR JS-->
		<script src="{{url('/zanex/plugins/p-scroll/perfect-scrollbar.js')}}"></script>

		<!-- INPUT MASK JS -->
		<script src="{{url('/zanex/plugins/input-mask/jquery.mask.min.js')}}"></script>

        <!-- Color Theme js -->
        <script src="{{url('/zanex/js/themeColors.js')}}"></script>

        <!-- CUSTOM JS -->
        <script src="{{url('/zanex/js/custom.js')}}"></script>

	</body>
</html>
