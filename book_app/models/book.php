<?php
require_once 'config/database.php';

class Book {
    private $conn;
    private $table = 'books';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function create($title, $author, $description) {
        $query = "INSERT INTO " . $this->table . " (title, author, description) VALUES (:title, :author, :description)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':description', $description);
        return $stmt->execute();
    }

    public function read($search = '', $page = 1, $perPage = 10) {
        $offset = ($page - 1) * $perPage;
        $query = "SELECT * FROM " . $this->table;
        if ($search) {
            $query .= " WHERE title LIKE :search";
        }
        $query .= " LIMIT :offset, :perPage";
        $stmt = $this->conn->prepare($query);
        if ($search) {
            $search = "%$search%";
            $stmt->bindParam(':search', $search);
        }
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindParam(':perPage', $perPage, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotal($search = '') {
        $query = "SELECT COUNT(*) as total FROM " . $this->table;
        if ($search) {
            $query .= " WHERE title LIKE :search";
        }
        $stmt = $this->conn->prepare($query);
        if ($search) {
            $search = "%$search%";
            $stmt->bindParam(':search', $search);
        }
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $title, $author, $description) {
        $query = "UPDATE " . $this->table . " SET title = :title, author = :author, description = :description WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}