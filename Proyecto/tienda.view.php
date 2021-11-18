<?php
$title_pag="LoVendo - Tienda";
include("header.php");
?>
    <section id="anuncios">
    	<?php 
        $ssql = "select * from Anuncio";
        $rs = mysql_query($ssql);
        //construcción de anuncios
        while($fila=mysql_fetch_array($rs)){
            
        }
        ?>
    </section>
<?php
include("footer.php");
?>