<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<main>
  <div>
    <section>
      <div>
        <h1>Envío de correo</h1>
      </div>
    </section>
  </div>
  <section>
    <div>
      <div>
          <form action="EnviarFormulario.php" method="post">
            <div>
              <label for="nombre">Nombre y primer apellido</label><br>
              <input id="nombre" name="nombre" type="text"  maxlength="50" data-length="50" required />
            </div>
            <div>
              <label for="email">E-mail</label><br>
              <input id="email" name="email" type="email"  maxlength="50" data-length="50" required />
            </div>
            <div>
              <label for="titmensaje">Mensaje</label>
              <div>
                <textarea name="mensaje" id="mensaje" class="ESPmensaje center-content" required></textarea>
              </div>  
            </div>
            <div class="espenv">
              <button type="submit" name="submit">Enviar</button>
              <h5 class="notifCorrecto"><?= $result; ?></h5>
            </div>                    
          </form>
      </div> 
    </div>                     
  </section>
</main>
</body>
</html>