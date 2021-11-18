<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style type="text/css">
  #mapa {
    height: 50vh;
  }
</style>
</head>
<body>
<div>Prueba</div>
<br>
<div id="mapa"></div>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIjUyM_Ldifl_4ZbkAPvtAjng38UOnAaY&callback=initMap"></script>
<script>
   function initMap() {
          var map;
          var bounds = new google.maps.LatLngBounds();
          var mapOptions = {
              mapTypeId: 'roadmap'
          };
 
          map = new google.maps.Map(document.getElementById('mapa'), {
              mapOptions
          });
 
          map.setTilt(50);
 
          // Crear múltiples marcadores desde la Base de Datos 
          var marcadores = [
              <?php include('googleMaps.php'); ?>
          ];

          // Creamos la ventana de información con los marcadores 
          var mostrarMarcadores = new google.maps.InfoWindow(),
              marcadores, i;
 
          // Colocamos los marcadores en el Mapa de Google 
          for (i = 0; i < marcadores.length; i++) {
              var position = new google.maps.LatLng(marcadores[i]);
              bounds.extend(position);
              marker = new google.maps.Marker({
                  position: position,
                  map: map,
                  title: marcadores[i]
              });

              // Centramos el Mapa de Google para que todos los marcadores se puedan ver 
              map.fitBounds(bounds);
          }
 
          // Aplicamos el evento 'bounds_changed' que detecta cambios en la ventana del Mapa de Google, también le configramos un zoom de 14 
          var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
              this.setZoom(14);
              google.maps.event.removeListener(boundsListener);
          });
 
      }
 
      // Lanzamos la función 'initMap' para que muestre el Mapa con Los Marcadores y toda la configuración realizada 
      google.maps.event.addDomListener(window, 'load', initMap); 
</script>
</body>
</html>

