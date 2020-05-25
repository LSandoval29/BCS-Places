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
	<!--Fontawesome-->
	 <!-- Font awesome -->
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<title>BCS Places </title>
</head>
<body>


	<div id="map"></div>
	<div class="list-group float-left" id="sidebar-places">
		<div class="sidebar">
			<img id ="img-lugar" alt="image" class="list-group-item col-sm-6">
		</div>
		<ul class="list-group">
		  <li class="col-sm-6 list-group-item "style="background-color:#2898bf;"><h3 class="h3" id="name-lugar"></h3></li>
		  <li class="col-sm-6 list-group-item"><h7 class="h5" id="name-category"></h7></li>
		  <li class="col-sm-6 list-group-item" id="descripcion-place"></li>
		  <li class="col-sm-6 list-group-item" id="domicilio-place"></li>
		  <li class="col-sm-6 list-group-item" id="num-place"></li>
		  <li class="col-sm-6 list-group-item nav-item" id="web-place"><a class="nav-link" href="#"></a></li>
		  <li class="col-sm-6 list-group-item" id="horario-place"></li>
		</ul>
	</div>
	
	<!--<div class="list-group float-right" id="categories">
		  <button type="button" class="list-group-item list-group-item-action" style="background-color:#2898bf;">
		  	<h3 class="h3">Categorias</h3>
		  </button>
		  <button type="button" class="list-group-item list-group-item-action">Hoteles</button>
		  <button type="button" class="list-group-item list-group-item-action">Restaurante</button>
		  <button type="button" class="list-group-item list-group-item-action">Cine</button>
		  <button type="button" class="list-group-item list-group-item-action">Escuelas</button>
		  <button type="button" class="list-group-item list-group-item-action">Estadios</button>
		  <button type="button" class="list-group-item list-group-item-action">Bar</button>
		  <button type="button" class="list-group-item list-group-item-action">Supermercados</button>
		  <button type="button" class="list-group-item list-group-item-action">Playas</button>
		  <button type="button" class="list-group-item list-group-item-action">Club Nocturnos</button>
	</div>-->



	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="https://api.tiles.mapbox.com/mapbox.js/plugins/turf/v3.0.11/turf.min.js"></script>
	<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.9/mapbox-gl-draw.js"></script>
	<!--Axios-->
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<!--Archivo js usado-->
	<script type="text/javascript" src="{{ asset ('app_assets/js/main.js') }}"></script>
    
	
</body>



</html>