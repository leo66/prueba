<!DOCTYPE html> 
<html>
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
   <title>ArriendosYa!</title> 
    <link rel="stylesheet" href="assets/css/jquery.mobile-1.4.5.min.css" />
    <link rel="stylesheet" href="assets/css/jquery.mobile.structure-1.4.5.min.css" />
    <link rel="stylesheet" href="assets/css/jquery.mobile.theme-1.4.5.min.css" />
    <script src="assets/js/jquery-1.7.2.min.js"></script>
    <script src="assets/js/jquery.mobile-1.4.5.min.js"></script>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCAV0iw8JlsZjE-ZRPiwbX9SxvpKSJNyfY"></script>
    
<script>
        	$( document ).on( "pageinit", "#paginaMapaHome", function(e,data) {
				
				var defaultPos = new google.maps.LatLng(19.289168, -99.653440);
				
				if (navigator.geolocation) {
		                function exito(pos) {
                     		MuestraMapa(new google.maps.LatLng(pos.coords.latitude, pos.coords.longitude));
						 
                   		}
						function falla(error) {
						//si falla mostrar mpara en posicion por defecto
							alert('Error en servicio Geolocalizador');
							MuestraMapa(defaultPos); 
						}
						
					//maximumAge- Guarda la posicion por 5 minutos 
					//enableHighAccuracy: Se tratan de obtener los mejores resultados posible del GPS
					//timeout: el tiempo maximo que se espera para obtener la posicion en este caso 5 segundos
						var options = {maximumAge: 500000, enableHighAccuracy:true, timeout: 5000};
						navigator.geolocation.getCurrentPosition(exito, falla, options );
					}//FIN IF
					else {
                    MuestraMapa(defaultPos);  // No soporta geolocalizacion y dibuja el mapa en posicion Default
               		 }
					 
					 //FUNCION DIBUJAR MAPa
					 function MuestraMapa(latlng) {
						
						var myOptions = {
                        zoom: 16,
                        center: latlng,
						disableDefaultUI: true,
                        mapTypeId: google.maps.MapTypeId.ROADMAP};
						
						var map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);
						var infowindow = new google.maps.InfoWindow({
                                  position: latlng,
                                  content: '<p>Tu posición actual</p>'+latlng
								  });
						
						var marker = new google.maps.Marker({
							position: latlng,
							map: map,
							title: "Mi posición",
							animation: google.maps.Animation.DROP
                    	});
						google.maps.event.addListener(marker, 'click', function() {infowindow.open(map,marker);});
						 
					 }
					 
					 // Fin muestra mapa
				
				});
        </script>
        <link rel="stylesheet" type="text/css" href="estilos/mapa.css">

</head>
 
<body> 
 
<div id="paginaMapaHome" data-role="page">
 
    <div data-role="header">
        <h1>Bienvenido </h1>
      <a href="index.php">Cerrar Sesion</a>
       <div data-role="navbar">
       <ul>
       <li><a href="Publicacion.html">Publicar</a></li>
        <li><a href="MiPublicacion.php">Mis Publicaciones</a></li>
         <li><a href="MiComentario.php">Mis Comentarios</a></li>
          <li><a href="MiPerfil.php">Mi Perfil</a></li>
       </ul></div>
    </div><!-- /header -->
 
     <div data-role="content">
 <div id="map-canvas"></div>
	     
    </div><!-- /content -->
     
    <!-- /footer -->
     
</div><!-- /page -->
 
</body>
</html>
