<?php

class Article {
    private $conn;
    private $table = "article";

    public $id_article;
    public $title;
    public $contenu;
    public $date_publication;
    public $status;
    
    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $sql = "INSERT INTO {$this->table} (title, contenu, date_publication, status) 
                VALUES (:title, :contenu, :date_publication, :status)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            "title" => $this->title,
            "contenu" => $this->contenu,
            "date_publication" => $this->date_publication,
            "status" => $this->status
        ]);
    }

    public function read() {
        $sql = "SELECT * FROM {$this->table}"; 
        $stmt = $this->conn->query($sql);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update() {
        $sql = "UPDATE {$this->table} SET title = :title, contenu = :contenu, 
                date_publication = :date_publication, status = :status 
                WHERE id_article = :id_article";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            "title" => $this->title,
            "contenu" => $this->contenu,
            "date_publication" => $this->date_publication,
            "status" => $this->status,
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
    $sql = "SELECT * FROM {$this->table} WHERE id_article = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
public function readLimit($limit) {
        
        $sql = "SELECT * FROM {$this->table} ORDER BY date_publication DESC LIMIT :limit";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}