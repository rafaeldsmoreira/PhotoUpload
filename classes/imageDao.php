<?php

class imageDao {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create(ImageClass $image) {
        $db = $this->db;
        $stmt = $db->prepare("INSERT INTO photos (album,name_photo,type,dateinclusion,legend) VALUES (?,?, ?, ?, ?)");

        $album = $image->getAlbumId();
        $stmt->bindParam(1, $album);

        $photoName = $image->getName_photo();
        $stmt->bindParam(2, $photoName);

        $type = $image->getType();
        $stmt->bindParam(3, $type);

        $dateIncls = $image->getDateInclusionPhoto();
        $stmt->bindParam(4, $dateIncls);

        $legend = $image->getLegend();
        $stmt->bindParam(5, $legend);
        return $stmt->execute();
    }

    public function delete($id) {
        $db = $this->db;
        $stmt = $db->prepare("delete FROM photos WHERE id=$id");
        return $stmt->execute();
    }

    public function removeAll() {
        $db = $this->db;
        $stmt = $db->prepare("delete FROM photos");
        return $stmt->execute();
    }

    public function getAllPhotosByIdUserAndIdAlbum($idUser, $idAlbum) {
        $photoArray = array();
        $db = $this->db;

        if ($idUser == '' && $idAlbum == '') {
            $stmt = $db->prepare("SELECT * FROM  `photos` ");
        } else if ($idUser != '' and $idAlbum != '') {
            $stmt = $db->prepare("SELECT p.*,a.name_album  FROM  photos p join album a on p.album=a.id join users u on u.id=a.userid where  u.id=$idUser and p.album=$idAlbum");
        } else if ($idAlbum == '' && $idUser != '') {
            $stmt = $db->prepare("SELECT p.*,a.name_album FROM  photos p join album a on p.album=a.id join users u on u.id=a.userid where  u.id=$idUser");
        }

        $stmt->execute();
        $result = $stmt->fetchAll();

        if (sizeof($result) > 0) {
            foreach ($result as $row) {

                $img = new ImageClass();
                $img->setId($row['id']);
                $img->setAlbumId($row['album']);
                $img->setName_photo($row['name_photo']);
                $img->setType($row['type']);
                $img->setDateInclusionPhoto($row['dateinclusion']);
                $img->setLegend($row['legend']);
                $img->setAlbumName($row['name_album']);
                $photoArray[] = $img;
            }
            return $photoArray;
        }
        return false;
    }

    public function getById($id) {

        $db = $this->db;
        $stmt = $db->prepare("SELECT * FROM  `photos` where id=?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $row = $stmt->fetch();

        if (isset($row['id'])) {

            $img = new ImageClass();
            $img->setId($row['id']);
            $img->setAlbumId($row['album']);
            $img->setName_photo($row['name_photo']);
            $img->setType($row['type']);
            $img->setDateInclusionPhoto($row['dateinclusion']);
            $img->setLegend($row['legend']);
            return $img;
        }
    }

    public function getPhotosByName($name_photo, $userId) {
        $db = $this->db;

        if ($name_photo != '') {
            $stmt = $db->prepare("SELECT * FROM  photos p join album a on p.album=a.id join users u on u.id=a.userid where name_photo=$name_photo and u.id=$userId");
        } else {
            $stmt = $db->prepare("SELECT * FROM  photos p join album a on p.album=a.id join users u on u.id=a.userid where  u.id=$userId");
        }
        $stmt->execute();
        $row = $stmt->fetch();

        if (isset($row['name_photo'])) {
            $img = new ImageClass();
            $img->setId($row['id']);
            $img->setAlbumId($row['album']);
            $img->setName_photo($row['name_photo']);
            $img->setType($row['type']);
            $img->setDateInclusionPhoto($row['dateinclusion']);
            $img->setLegend($row['legend']);

            return $img;
        }
        return false;
    }

    public function editPhoto(ImageClass $image) {

        $db = $this->db;
        $id = $image->getId();
        $stmt = $db->prepare("update photos p set p.dateinclusion=?,p.legend=? where p.id=$id");
        $dateIncls = $image->getDateInclusionPhoto();
        $stmt->bindParam(1, $dateIncls);
        $legend = $image->getLegend();
        $stmt->bindParam(2, $legend);
        return $stmt->execute();
    }

}

?>
