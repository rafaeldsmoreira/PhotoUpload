<?php

class ImageClass {

    private $id;
    private $albumId;
    private $name_photo;
    private $type;
    private $dateInclusionPhoto;
    private $legend;
    private $albumName;
    

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getAlbumId() {
        return $this->albumId;
    }

    public function setAlbumId($album) {
        $this->albumId = $album;
    }

    public function getName_photo() {
        return $this->name_photo;
    }

    public function setName_photo($name_photo) {
        $this->name_photo = $name_photo;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function getDateInclusionPhoto() {
        return $this->dateInclusionPhoto;
    }

    public function setDateInclusionPhoto($dateInclusionPhoto) {
        $this->dateInclusionPhoto = $dateInclusionPhoto;
    }

    public function getLegend() {
        return $this->legend;
    }

    public function setLegend($legend) {
        $this->legend = $legend;
    }
    public function getAlbumName() {
        return $this->albumName;
    }

    public function setAlbumName($albumName) {
        $this->albumName = $albumName;
    }


}

?>
