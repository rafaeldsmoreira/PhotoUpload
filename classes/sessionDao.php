<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of createSessionClass
 *
 * @author Rafael
 *  private $db;
 */


class sessionDao {
     private $db;
     
     public function __construct($db) {
        $this->db = $db;
    }
    
    
    
    public function create(UserClass $user){
        
        
        
        $db = $this->db;
        $stmt = $db->prepare("INSERT INTO `session`( user,iduser,date,hora) VALUES (?,?,?,?)");
        
         $usuario=$user->getUser();
        $stmt->bindParam(1, $usuario);

         $iduser=$user->getId();
        $stmt->bindParam(2, $iduser);
        
        $date=$user->getDateCad();
        $stmt->bindParam(3, $date);
        
        $hora=$user->getHora();
        $stmt->bindParam(4, $hora);
        
        

        return $stmt->execute();
    }
    
    
    
     public function remove(){
        
         
        $db = $this->db;
        $stmt = $db->prepare("delete from session ");

        return $stmt->execute();
    }
    
    
    public function getSession(){
       
         $user= new UserClass();
        $db = $this->db;
        $albumArray = Array();
        
        
            $stmt = $db->prepare("SELECT * from session ");
        
        $stmt->execute();
        $result = $stmt->fetchAll();

        if (sizeof($result) > 0) {
            foreach ($result as $row) {
               
                $user->setUser($row['user']);
                $user->setId($row['iduser']);
               
            }

            return $user;
    }
    return false;
    }
    
    
    
    //put your code here
}

?>
