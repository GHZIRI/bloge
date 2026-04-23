<?php

class Article{

   private $conn;
   private $table ="articles";

   public $id_article;
   public $title;
   public $contenu;
   public $date_publication;
   public $status;
    
   public function __construct($db) {
    $this->conn = $db;
   }
   public function create(){
    $sql = "INSERT INTO  (title,contenu,date_publication,status) 
    VALUES(:title,:contenu,:date_publication,:status)";
    $stmt = $this->conn->prepare($sql);
      return $stmt->execute([
         "title"=> $this->title,
         "contenu" => $this->contenu,
         "date_publication" => $this->date_publication,
         "status" => $this->status

      ]);
   }

   public function read(){
      $sql = "SELECT FROM {$this->table}"; 
         $stmt = $this->conn->query($sql);
         return $stmt = $this->conn->fetchall(PDO::FETCH_ASSOC);
   }

   public function update(){
      $sql = "UPDATE {$this->table}SET title = :title,contenu = :contenu, 
      date_publication = :date_publication, status = :status WHERE id_article = :id_article";
         $stmt = $this->conn->prepare($sql);
      return $stmt->execute([
         "title"=> $this->title,
         "contenu" => $this->contenu,
         "date_publication" => $this->date_publication,
         "status" => $this->status

      ]);
   }

   public function delete(){
      $sql = "DELETE FROM {$this->table} where id_article = :id_article";
      $stmt = $this->conn->prepare($sql);
      return $stmt->execute([
         "id_article" => $this->id_article,
      ]);
   }
}

