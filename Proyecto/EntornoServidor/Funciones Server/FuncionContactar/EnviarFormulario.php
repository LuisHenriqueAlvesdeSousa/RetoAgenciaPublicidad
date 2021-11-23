<?php
$result="";
if(isset($_POST['submit'])){
    require 'phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->Port=587;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';
    $mail->Username='guillermo.mediero@ikasle.egibide.org';
    $mail->Password='PDHcqx49';

    $mail->setFrom($_POST['email'],$_POST['nombre']);
    $mail->addAddress('gmediero123@gmail.com');
    $mail->addReplyTo($_POST['email'],$_POST['nombre']);

    $mail->isHTML(true);
    $mail->Subject='Enviado por '.$_POST['nombre'];
    $mail->Body='<h1 align=center>Nombre: '.$_POST['nombre'].'<br>Email: '.$_POST['email'].'<br
    >Mensaje: '.$_POST['mensaje'].'</h1>';
    if(!$mail->send()){
        $result="Algo esta mal, por favor inténtelo de nuevo.";
    }
    else{
        $result="Gracias ".$_POST['nombre']." por contactarnos, espera la respuesta!";
    }
}

require "EnviarFormulario.view.php";
?>