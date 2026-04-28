<?php

class Article {
    private $conn;
    private $table = "article"; 

    public $id_article;
    public $title;
    public $contenu;
    public $date_publication;
    public $status;
    public $id_user;
    public $id_catalog;

    public function __construct($db) {
        $this->conn = $db;
    }

    
    public function create() {
        $sql = "INSERT INTO {$this->table} (title, contenu, status, id_user, id_catalog) 
                VALUES (:title, :contenu, :status, :id_user, :id_catalog)";
        
        $stmt = $this->conn->prepare($sql);
        
        return $stmt->execute([
            "title"      => $this->title,
            "contenu"    => $this->contenu,
            "status"     => $this->status,
            "id_user"    => $this->id_user,
            "id_catalog" => $this->id_catalog
        ]);
    }

   
    public function read() {
        
        $sql = "SELECT a.*, u.name_user, c.name_catalog 
                FROM {$this->table} a
                LEFT JOIN users u ON a.id_user = u.id_user
                LEFT JOIN catalog c ON a.id_catalog = c.id_catalog
                ORDER BY a.date_publication DESC"; 
                
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

   
    public function update() {
        $sql = "UPDATE {$this->table} 
                SET title = :title, contenu = :contenu, status = :status, 
                    id_user = :id_user, id_catalog = :id_catalog
                WHERE id_article = :id_article";
                
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            "title"      => $this->title,
            "contenu"    => $this->contenu,
            "status"     => $this->status,
            "id_user"    => $this->id_user,
            "id_catalog" => $this->id_catalog,
            "id_article" => $this->id_article 
        ]);
    }

    
    public function delete() {
        $sql = "DELETE FROM {$this->table} WHERE id_article = :id_article";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            "id_article" => $this->id_article,
        ]);
    }

   
    public function readOne($id) {
        $sql = "SELECT a.*, u.name_user, u.email_user, c.name_catalog 
                FROM {$this->table} a
                LEFT JOIN users u ON a.id_user = u.id_user
                LEFT JOIN catalog c ON a.id_catalog = c.id_catalog
                WHERE a.id_article = :id";
                
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}