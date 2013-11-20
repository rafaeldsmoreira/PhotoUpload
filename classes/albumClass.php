<?php

class AlbumClass {

    private $idAlbum;
    private $idUser;
    private $nameUser;
    private $nameAlbum;
    private $photoCapa;
    private $dateInclusionAlbum;
    private $directory;

    public function getIdAlbum() {
        return $this->idAlbum;
    }

    public function setIdAlbum($idAlbum) {
        $this->idAlbum = $idAlbum;
    }

    public function getIdUser() {
        return $this->idUser;
    }

    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    public function getNameUser() {
        return $this->nameUser;
    }

    public function setNameUser($nameUser) {
        $this->nameUser = $nameUser;
    }

    public function getNameAlbum() {
        return $this->nameAlbum;
    }

    public function setNameAlbum($nameAlbum) {
        $this->nameAlbum = $nameAlbum;
    }

    public function getPhotoCapa() {
        return $this->photoCapa;
    }

    public function setPhotoCapa($photoCapa) {
        $this->photoCapa = $photoCapa;
    }

    public function getDateInclusionAlbum() {
        return $this->dateInclusionAlbum;
    }

    public function setDateInclusionAlbum($dateInclusionAlbum) {
        $this->dateInclusionAlbum = $dateInclusionAlbum;
    }

    public function getDirectory() {
        return $this->directory;
    }

    public function setDirectory($directory) {
        $this->directory = $directory;
    }

}

?>
