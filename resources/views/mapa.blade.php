<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <!--ICONO DE LA APPLICACION-->
    <link rel="icon" type="img/png" href="{{ asset ('app_assets/imagenes/map.png') }}" >
    <!--ESTILOS CSS DEL MAPA-->
	<link rel="stylesheet" type="text/css" href="{{ asset ('app_assets/css/main.css') }}">
    <!--MAPBOX-->
	<script src='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.js'></script>
	<link href='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.css' rel='stylesheet' />
    <!--CDN DE BOOTSTRAP-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>BCS Places </title>
</head>
<body style="background: #2898bf;">

	<div id="app">
		<div id="map"></div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="https://api.tiles.mapbox.com/mapbox.js/plugins/turf/v3.0.11/turf.min.js"></script>
	<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.9/mapbox-gl-draw.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	<!--Axios-->
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<!--Archivo js usado-->
	<script type="text/javascript" src="{{ asset ('app_assets/js/main.js') }}"></script>
    
	
</body>



</html>