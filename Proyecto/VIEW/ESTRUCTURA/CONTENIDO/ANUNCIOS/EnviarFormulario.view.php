<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../CSS/styleAnuncio.css">
    <title>Document</title>
</head>
<body>
<main>
  
<?php 

require "./VIEW/ESTRUCTURA/ESTATICO/header.view.php"; 
require "./VIEW/ESTRUCTURA/ESTATICO/nav.view.php"

?>
<div class="cuerpo">
  <div class="principal">
        <h1>Enviale un correo al vendedor</h1>
  </div>
  <section>
    <div>
      <div>
          <form action="EnviarFormulario.php" method="post" id="correo">
            <div>
              <input id="nombre" name="nombre" type="text"  maxlength="50" data-length="50" placeholder="Nombre y primer apellido" required />
            </div>
            <div>
              <input id="email" name="email" type="email"  maxlength="50" data-length="50" placeholder="E-mail" required />
            </div>
            <div>
              <div>
                <textarea name="mensaje" id="mensaje" class="ESPmensaje center-content" placeholder="Mensaje..." required></textarea>
              </div>  
            </div>
            <div class="espenv">
              <button type="submit" id="submit" name="submit">Enviar</button>
              <h5 class="notifCorrecto"><?= $result; ?></h5>
            </div>                    
          </form>
      </div> 
    </div>                     
  </section>
</div>
</main>
<?php

    require "./VIEW/ESTRUCTURA/ESTATICO/footer.view.php"

?>
</body>
</html>