<?php
    function connect(){
        try{      
        $host = "localhost";
        $dbname = "retoPubliGrupo1";
        $user = "root";
        $pass = "";
        
            $dbh= new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
            return $dbh;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function close(){
        $dbh = null;
        return $dbh;
    }
?>