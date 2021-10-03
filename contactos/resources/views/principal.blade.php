<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contactos</title>

	<!-- CSS -->
	<!-- <link rel="stylesheet" href="css/app.css">
	<link rel="stylesheet" href="css/all.min.css"> -->

	<link rel="stylesheet" href="css/all.css">
</head>

<body>
	<div id="app">
		@include('nav')

		<div class="container-fluid" style="margin-top: 25px;">

			<!-- Card de contenido -->
			@yield('contenido')

		</div>

	</div>

	<!-- JS -->
	<!-- <script src="js/app.js"></script>
	<script src="js/all.min.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script> -->

	<script src="js/all.js"></script>
	<script src="js/appVue.js"></script>
</body>

</html>