<?php

class albumDao {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create(AlbumClass $album) {
        
        
        $db = $this->db;
        $stmt = $db->prepare("INSERT INTO album (name_album,userid,dateinclusion,photo_capa, directory ) VALUES (?,?,?, ?, ?)");

         $albumName = $album->getNameAlbum();
        $stmt->bindParam(1, $albumName);

         $user = $album->getIdUser();
        $stmt->bindParam(2, $user);

         $dateInclusion = $album->getDateInclusionAlbum();
        $stmt->bindParam(3, $dateInclusion);

         $photoCapa = $album->getPhotoCapa();
        $stmt->bindParam(4, $photoCapa);

         $directory = $album->getDirectory();
        $stmt->bindParam(5, $directory);
        
        
        return $stmt->execute();
    }

    public function delete($idAlbum) {

        $db = $this->db;
        $stmt = $db->prepare("delete FROM album  where id=$idAlbum");
        return $stmt->execute();
    }

    public function removeAll() {

        $db = $this->db;
        $stmt = $db->prepare("delete FROM album");
        return $stmt->execute();
    }
    
    
     public function removeByIdalbum($idAlbum) {

        $db = $this->db;
        $stmt = $db->prepare("delete FROM album where id=$idAlbum");
        return $stmt->execute();
    }
    
    

    public function update($id,$nameAlbum) {
        
        $db = $this->db;
        $stmt = $db->prepare("UPDATE `album` SET `name_album`=? WHERE userid=$id");

        $stmt->bindParam(1, $nameAlbum);

        
        return $stmt->execute();
        
    }

    public function getById($id) {

      $db = $this->db;
      $stmt = $db->prepare("SELECT a.*,u.user FROM `album` a join users u on u.id=a.userid where a.id=$id");

      $stmt->execute();
      $row = $stmt->fetch();
      
      if (isset($row['id'])) {

      $album = new AlbumClass();
      
                $album->setIdAlbum($row['id']);
                $album->setIdUser($row['userid']);
                $album->setNameUser($row['user']);
                $album->setNameAlbum($row['name_album']);
                $album->setDateInclusionAlbum($row['dateinclusion']);
                $album->setPhotoCapa($row['photo_capa']);
                $album->setDirectory($row['directory']);
                
      $albuns = $album;
      return  $albuns;
      
      }
      } 

    Public function getAlbumByPhotoCapa($album) {

        $db = $this->db;
        $stmt = $db->prepare("SELECT * FROM  `album` where photo_capa='?'");
        $stmt->bindParam(1, $album);
        $stmt->execute();
        $row = $stmt->fetch();


          if (sizeof($row) > 0) {
            $album = new AlbumClass();
            $album->setIdAlbum($row['id']);
            $album->setIdUser($row['userid']);
            $album->setNameAlbum($row['name_album']);
            $album->setDateInclusionAlbum($row['dateinclusion']);
            $album->setPhotoCapa($row['photo_capa']);
            $album->setDirectory($row['directory']);
            return $album;
        }
        return false;
    }
    
    Public function getAlbumByNameContains($nameAlbum,$userId) {

        $db = $this->db;
        $albumArray = Array();
        
        
            $stmt = $db->prepare("SELECT a.*,u.user FROM `album` a join users u on u.id=a.userid 
            where a.name_album like'%$nameAlbum%' and u.id=$userId  order by a.name_album ");
        
        $stmt->execute();
        $result = $stmt->fetchAll();

        if (sizeof($result) > 0) {
            foreach ($result as $row) {
                $album = new AlbumClass();
                $album->setIdAlbum($row['id']);
                $album->setIdUser($row['userid']);
                $album->setNameUser($row['user']);
                $album->setNameAlbum($row['name_album']);
                $album->setDateInclusionAlbum($row['dateinclusion']);
                $album->setPhotoCapa($row['photo_capa']);
                $album->setDirectory($row['directory']);
                $albumArray[] = $album;
            }

            return $albumArray;
    }
    return false;
    }
    
    
    
    Public function getAlbumByNameEqual($nameAlbum,$userId) {

        $db = $this->db;
       $albumArray = Array();
       
       $stmt = $db->prepare("SELECT a.*,u.user FROM `album` a join users u on u.id=a.userid 
            where a.name_album ='$nameAlbum' and u.id=$userId  order by a.name_album ");
        
        $stmt->execute();
        $result = $stmt->fetchAll();

        if (sizeof($result) > 0) {
            foreach ($result as $row) {
                $album = new AlbumClass();
                $album->setIdAlbum($row['id']);
                $album->setIdUser($row['userid']);
                $album->setNameUser($row['user']);
                $album->setNameAlbum($row['name_album']);
                $album->setDateInclusionAlbum($row['dateinclusion']);
                $album->setPhotoCapa($row['photo_capa']);
                $album->setDirectory($row['directory']);
                
            }

            return $album;
        }
        else
            return false;
    }
    
    
    
    
    
    

    Public function getIdAlbumByPhotoCapa($album, $userId) {

        $db = $this->db;
        $stmt = $db->prepare("SELECT * FROM  album a where a.photo_capa='$album' and a.userid=$userId");

        $stmt->execute();
        $row = $stmt->fetch();
        $id = false;
        if (isset($row['id'])) {
            $id = ($row['id']);
            return $id;
        }
        return $id;
    }
    
    Public function getIdAlbumByMaiorId($userId) {

        $db = $this->db;
        $stmt = $db->prepare("SELECT * FROM  album a where  a.userid=$userId");

        $stmt->execute();
        $row = $stmt->fetch();
        $id = false;
        if (isset($row['id'])) {
            $id = ($row['id']);
            return $id;
        }
        return $id;
    }
    
    
    

    Public function getAlbuns($userid, $albumid) {

        $albumArray = Array();
        $db = $this->db;


        if ($albumid == '' && $userid != '') {
            $stmt = $db->prepare("SELECT a.*,u.user FROM `album` a join users u on u.id=a.userid where a.userid=$userid");
        } elseif ($albumid == '' && $userid == '') {

            $stmt = $db->prepare("SELECT a.*,u.user FROM `album` a join users u on u.id=a.userid");
        } else {

            $stmt = $db->prepare("SELECT a.*,u.user FROM `album` a join users u on u.id=a.userid where a.id=$albumid and a.userid=$userid");
        }
        $stmt->execute();
        $result = $stmt->fetchAll();

        if (sizeof($result) > 0) {
            foreach ($result as $row) {
                $album = new AlbumClass();
                $album->setIdAlbum($row['id']);
                $album->setIdUser($row['userid']);
                $album->setNameUser($row['user']);
                $album->setNameAlbum($row['name_album']);
                $album->setDateInclusionAlbum($row['dateinclusion']);
                $album->setPhotoCapa($row['photo_capa']);
                $album->setDirectory($row['directory']);
                $albumArray[] = $album;
            }

            return $albumArray;
        }
        else
            return false;
    }

}

?>
