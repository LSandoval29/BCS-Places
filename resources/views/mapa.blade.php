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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<title>BCS Places </title>
</head>
<body>


	<div id="map"></div>
	<div class="list-group float-left" id="sidebar-places">
		<div>
			<img id ="img-lugar" alt="image" class="list-group-item col-sm-6">
		</div>
		<ul class="list-group">
		  <li class="col-sm-6 list-group-item "style="background-color:#2898bf;"><h3 class="h5 m-0 font-weight-bold" id="name-lugar"></h3></li>
		  <li class="col-sm-6 list-group-item"><h7 class="h5 text-muted" id="name-category"></h7></li>
		  <li class="col-sm-6 list-group-item"><i class="fas fa-audio-description"> </i> <label id="descripcion-place" style="color:#a9a9a9;"></label></li>
		  <li class="col-sm-6 list-group-item"><i class="fas fa-map-marker-alt"> </i> <label id="domicilio-place" style="color:#a9a9a9;"></label></li>
		  <li class="col-sm-6 list-group-item"><i class="fas fa-phone"> </i> <label id="num-place" style="color:#a9a9a9;">></label></li>
		  <li class="col-sm-6 list-group-item nav-item">
		  	<i class="fas fa-globe-americas"> </i> 
			  <a target="_blank" id="web-place"></a>
		  </li>
		  <li class="col-sm-6 list-group-item"><i class="fas fa-clock"> </i> <label id="horario-place" style="color:#a9a9a9;"></label></li>
		</ul>
	</div>
	
	<div class="list-group float-right" id="categories">
		  <button type="button" class="list-group-item list-group-item-action" style="background-color:#2898bf;">
		  	<h3 class="h5 m-0 font-weight-bold">Categorias</h3>
		  </button>
		  <button onclick="markersByCategory(1)"  class="list-group-item list-group-item-action">Hoteles</button>
		  <button onclick="markersByCategory(2)"  class="list-group-item list-group-item-action">Restaurantes</button>
		  <button onclick="markersByCategory(3)" class="list-group-item list-group-item-action">Cines</button>
		  <button onclick="markersByCategory(4)" class="list-group-item list-group-item-action">Escuelas</button>
		  <button onclick="markersByCategory(5)" class="list-group-item list-group-item-action">Estadios</button>
		  <button onclick="markersByCategory(6)" class="list-group-item list-group-item-action">Bares</button>
		  <button onclick="markersByCategory(7)" class="list-group-item list-group-item-action">Supermercados</button>
		  <button onclick="markersByCategory(8)" class="list-group-item list-group-item-action">Playas</button>
		  <button onclick="markersByCategory(9)" class="list-group-item list-group-item-action">Clubes Nocturnos</button>
	</div>



	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="https://api.tiles.mapbox.com/mapbox.js/plugins/turf/v3.0.11/turf.min.js"></script>
	<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.9/mapbox-gl-draw.js"></script>
	<!--Axios-->
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<!--Archivo js usado-->
	<script type="text/javascript" src="{{ asset ('app_assets/js/main.js') }}"></script>
    
	
</body>



</html>