<?php

class ArtistasModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpespecial;charset=utf8', 'root', '');
    }


    // Devuelve la lista de artistas completa.
    public function getAllartistas() {
    // 1. abro conexión a la DB
    // ya esta abierta por el constructor de la clase
    // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT * FROM artistas");
        $query->execute();

    // 3. obtengo los resultados
        $artistas = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
    
        return $artistas;
}

    public function getartista($id){
        $query = $this->db->prepare("SELECT * from artistas WHERE artista_id = ?");
        $query->execute(array($id));
        $artista = $query->fetch(PDO::FETCH_OBJ);
        return $artista;
    }

    public function getrecitales($id){
        $query = $this->db->prepare("SELECT a.* FROM recitales a INNER JOIN artistas b ON a.artista_id = b.artista_id WHERE a.artista_id = ?");
        $query->execute(array($id));
        $recitales = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
      
        return $recitales;
    
    }
    public function deleteartistaById($id){
        $query = $this->db->prepare("DELETE FROM artistas WHERE artista_id=?");
        $query->execute(array($id));  
    }
    
    public function Insertartista($nombre, $nacionalidad){
        $query = $this->db->prepare("INSERT INTO artistas (nombre, nacionalidad) VALUES (?, ?)");
        $query->execute([ $nombre, $nacionalidad]);
    
        return $this->db->lastInsertId();
    }
    public function editartista($nombre, $nacionalidad, $artista_id){
        $query = $this->db->prepare('UPDATE artistas SET nombre = ?, nacionalidad = ? WHERE artista_id = ?');
        $query->execute([$nombre, $nacionalidad, $artista_id,]);
    }
 
}