<?php

class ConnectionFactory {
   

    private $dbType = 'mysql';
    private $host ='photouploaddb.cb8g6wvp9xra.sa-east-1.rds.amazonaws.com';
    //private $host ='localhost';
    private $dbport = '3306';
    private $user = 'root';
    private $pass = 'root123456';
    //private $pass = '';
    private $dbName = 'photoupload';
    
    //private $dbName = 'imagesprocess';
    

    public function getConnection() {
        $conn = null;
        try {
            $conn = new PDO(
                    $this->dbType . ':host=' . $this->host.';dbport='. $this->dbport  . ';dbname=' . $this->dbName,$this->user, $this->pass
            );
            //echo'conectou'; 
        } catch (PDOException $e) {
            echo 'DB Error: ' . $e->getMessage();
             echo "<script> alert('Não foi possivel conectar-se ao banco RDS.'); </script>";
            
        }
        return $conn;
    }

}

?>