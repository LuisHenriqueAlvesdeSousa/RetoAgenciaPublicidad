<?php
     include('conexion.php'); 
 
     // Listamos las direcciones con todos sus datos (lat, lng, dirección, etc.)
     $result = mysqli_query($con, "SELECT ubicacion FROM Anuncio");
    
     // Seleccionamos los datos para crear los marcadores en el Mapa de Google serian direccion, lat y lng 
     while ($row = mysqli_fetch_array($result)) {
         echo '["' . $row['ubicacion'] .  '],';
     }
?>