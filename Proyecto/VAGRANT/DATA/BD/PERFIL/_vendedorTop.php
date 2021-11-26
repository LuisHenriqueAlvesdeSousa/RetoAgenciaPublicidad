<?php
    try{
        require "/BD/CONEXION/conexion.php";
        require "/UML/Perfil/Perfil.php";

        $conexion = new Conexion();
        $c = $conexion.getConexion();
        $sql = "SELECT * FROM perfil WHERE idPerfil IN (SELECT idPerfil FROM interaccion WHERE COUNT(idAnuncio) IN ());";
        $stament = $c->prepare($sql);
        $statement->setFechMode(PDO::FETCH_ASSOC);
        $valor = $statement->execute($usuario.idPerfil);

        if($valor){
            $listaAnuncios = Array();
            while($row = $statement->fetch()){
                $a = new Anuncio($row["idAnuncio"], $row["titulo"], $row["descripcion"], $row["precio"], $row["estado"], $row["pathFoto"], $row["fchPublicacion"], $row["idPerfil_Admin"], $row["idPerfil_Comprador"], $row["idCategoria"]);
                $listaAnuncios[] = $a;
            }

            echo json_encode($listaAnuncios);

        }else{
            throw new Exception("Historial de compra vacio.");
        }
        
    }catch(Exception $e){
        echo $e->getMessage();
    }
    
?>


SELECT *
FROM perfil
WHERE idPerfil IN (SELECT idPerfil
                    FROM  interaccion
                    WHERE idAnuncio IN (SELECT ...)
                    AND MAX(COUNT(idAnuncio)) IN (SELECT COUNT(idAnuncio)
                                                    FROM interaccion
                                                    WHERE idAnuncio IN (
                                                                        SELECT idAnuncio
                                                                        FROM anuncio
                                                                        WHERE idPerfil_Comprador IS NOT NULL
                                                                        )
                                                    GROUP BY idPerfil));

SELECT idPerfil
FROM interaccion
WHERE 

SELECT COUNT(a.idAnuncio)
FROM anuncio a, perfil p
WHERE a.idPerfil_Admin = p.idPerfil
AND a.idPerfil_Comprador IS NOT NULL


el perfil que tengan mas anuncios con idperfil_comprador en not null

// esta es la mejor query

SELECT idPerfil_Admin
FROM anuncio
WHERE idAnuncio IN (
                    SELECT idAnuncio
                    FROM anuncio
                    WHERE idPerfil_Comprador IS NOT NULL
                    )
GROUP BY idPerfil_Admin                
HAVING COUNT(idPerfil_Admin) IN 
;

WHERE idPerfil_Comprador IS NOT NULL
AND max(count(idAnuncio)) in (select count(idAnuncio)
                            from anuncio
                            )
group by idPerfil_Admin;

SELECT idPerfil_Admin
FROM anuncio
WHERE idPerfil_Comprador IS NOT NULL
AND MAX(COUNT(idAnuncio))
group by idPerfil_Admin;


SELECT a.idPerfil_Admin
FROM anuncio a, anuncio anun
WHERE a.idAnuncio = anun.idAnuncio
AND 




SELECT max(count(idAnuncio))
                    FROM anuncio
                    WHERE idPerfil_Comprador IS NOT NULL
                    group by idPerfil_Admin;