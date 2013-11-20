<?php

class userDao {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function update(UserClass $userobj) {


        $db = $this->db;
        $idUser = $userobj->getId();
        echo 'id:' . $idUser;
        $stmt = $db->prepare("update users u set u.name=?, u.user=?, u.password=?,u.email=?  where u.id=$idUser");


        echo"<br>name:" . $name = $userobj->getName();

        $stmt->bindParam(1, $name);

        echo"<br>user:" . $user = $userobj->getUser();

        $stmt->bindParam(2, $user);

        echo"<br>pass:" . $password = $userobj->getSenha();

        $stmt->bindParam(3, $password);

        echo"<br>email:" . $email = $userobj->getEmail();

        $stmt->bindParam(4, $email);


        return $stmt->execute();
    }

    public function create(UserClass $userobj) {


        $db = $this->db;
        $stmt = $db->prepare(" INSERT INTO users(name, user, password,email,datCad) VALUES (?,?,?,?,?)");
        //INSERT INTO users(name, user, password,email,datCad) VALUES ('rafael5','rafaelh',123,'rafa@',2013-08-30)");


        echo"<br>name:" . $name = $userobj->getName();

        $stmt->bindParam(1, $name);

        echo"<br>user:" . $user = $userobj->getUser();

        $stmt->bindParam(2, $user);

        echo"<br>pass:" . $password = $userobj->getSenha();

        $stmt->bindParam(3, $password);

        echo"<br>email:" . $email = $userobj->getEmail();

        $stmt->bindParam(4, $email);

        echo"<br>date:" . $dateCad = $userobj->getDateCad();

        $stmt->bindParam(5, $dateCad);

        return $stmt->execute();
    }

    public function getUserByNameUser($user) {
        
      $db = $this->db;
            $stmt = $db->prepare("SELECT * FROM  `users` where user='$user'");
        
        //$stmt->bindParam(1, $user);
        //$stmt->bindParam(2, $password);
        $stmt->execute();
        $row = $stmt->fetch();


        if (isset($row['id'])) {
            $user = new userClass();
            $user->setId($row['id']);
            $user->setName($row['name']);
            $user->setUser($row['user']);
            $user->setSenha($row['password']);
            $user->setEmail($row['email']);
            $user->setDateCad($row['datCad']);
            return $user;
        }
        echo 'não encontrou';
        return false;
    }
    
    public function getUserByEmail($email) {
        
      $db = $this->db;
            $stmt = $db->prepare("SELECT * FROM  `users` where email='$email'");
        
        //$stmt->bindParam(1, $user);
        //$stmt->bindParam(2, $password);
        $stmt->execute();
        $row = $stmt->fetch();


        if (isset($row['id'])) {
            $user = new userClass();
            $user->setId($row['id']);
            $user->setName($row['name']);
            $user->setUser($row['user']);
            $user->setSenha($row['password']);
            $user->setEmail($row['email']);
            $user->setDateCad($row['datCad']);
            return $user;
        }
        echo 'não encontrou';
        return false;
    }



    Public function getUserById($userId) {
$db = $this->db;
$stmt = $db->prepare("SELECT * FROM  `users` where id='$userId'");

        $stmt->execute();
        $row = $stmt->fetch();


        if (isset($row['id'])) {
            $user = new userClass();
            $user->setId($row['id']);
            $user->setName($row['name']);
            $user->setUser($row['user']);
            $user->setSenha($row['password']);
            $user->setEmail($row['email']);
            $user->setDateCad($row['datCad']);
            return $user;
        }
        //echo 'não encontrou';
        return false;
    }
    
     Public function getUserByUserPassword($user,$password ) {



        $db = $this->db;

        if ($password != '') {
           
            $stmt = $db->prepare("SELECT * FROM  `users` where user='$user' and password='$password'");
        } else {
            
            $stmt = $db->prepare("SELECT * FROM  `users` where id='$user'");
        }
        //$stmt->bindParam(1, $user);
        //$stmt->bindParam(2, $password);
        $stmt->execute();
        $row = $stmt->fetch();


        if (isset($row['id'])) {
            $user = new userClass();
            $user->setId($row['id']);
            $user->setName($row['name']);
            $user->setUser($row['user']);
            $user->setSenha($row['password']);
            $user->setEmail($row['email']);
            $user->setDateCad($row['datCad']);
            return $user;
        }return false;
        
     }
     
     Public function getUserByEmailPassword($Email,$password ) {
      $db = $this->db;
     //echo 'não encontrou';
         $stmt = $db->prepare("SELECT * FROM  `users` where email='$Email' and password='$password'");
        $stmt->execute();
        $row = $stmt->fetch();
         if (isset($row['id'])) {
            $user = new userClass();
            $user->setId($row['id']);
            $user->setName($row['name']);
            $user->setUser($row['user']);
            $user->setSenha($row['password']);
            $user->setEmail($row['email']);
            $user->setDateCad($row['datCad']);
            return $user;
        }else return false;
    }
}

?>
