<?php
      function connect($host,$dbname,$user,$pass){
        try{
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