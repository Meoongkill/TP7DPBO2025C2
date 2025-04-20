<?php
// models/Girlfriend.php
require_once __DIR__ . '/../config/configuration.php';

class Girlfriend {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM girlfriends");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM girlfriends WHERE girlfriend_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO girlfriends (name, age, availability_status, photo) VALUES (?, ?, ?, ?)");
        return $stmt->execute([
            $data['name'],
            $data['age'],
            $data['availability_status'],
            $data['photo'],
        ]);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE girlfriends SET name = ?, age = ?, availability_status = ?, photo = ? WHERE girlfriend_id = ?");
        return $stmt->execute([
            $data['name'],
            $data['age'],
            $data['availability_status'],
            $data['photo'],
            $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM girlfriends WHERE girlfriend_id = ?");
        return $stmt->execute([$id]);
    }

    public function getByName($username) {
        $stmt = $this->db->prepare("SELECT * FROM girlfriends WHERE name = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>