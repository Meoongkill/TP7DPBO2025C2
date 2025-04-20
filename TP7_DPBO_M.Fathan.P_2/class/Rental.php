<?php
// models/Rental.php
require_once __DIR__ . '/../config/configuration.php';

class Rental {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT rentals.*, users.username, girlfriends.name AS girlfriend_name 
                                   FROM rentals
                                   JOIN users ON rentals.user_id = users.user_id
                                   JOIN girlfriends ON rentals.girlfriend_id = girlfriends.girlfriend_id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM rentals WHERE rental_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO rentals (user_id, girlfriend_id, start_date, end_date, status, total_price) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['user_id'],
            $data['girlfriend_id'],
            $data['start_date'],
            $data['end_date'],
            $data['status'],
            $data['total_price']
        ]);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE rentals SET user_id = ?, girlfriend_id = ?, start_date = ?, end_date = ?, status = ?, total_price = ? WHERE rental_id = ?");
        return $stmt->execute([
            $data['user_id'],
            $data['girlfriend_id'],
            $data['start_date'],
            $data['end_date'],
            $data['status'],
            $data['total_price'],
            $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM rentals WHERE rental_id = ?");
        return $stmt->execute([$id]);
    }

    public function getByUserId($user_id) {
        $stmt = $this->db->prepare("SELECT * FROM rentals WHERE user_id = ?");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByGirlfriendId($girlfriend_id) {
        $stmt = $this->db->prepare("SELECT * FROM rentals WHERE girlfriend_id = ?");
        $stmt->execute([$girlfriend_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByStatus($status) {
        $stmt = $this->db->prepare("SELECT * FROM rentals WHERE status = ?");
        $stmt->execute([$status]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getbyName($username) {
        $stmt = $this->db->prepare("SELECT * FROM rentals WHERE name = ?");
        $stmt->execute([$username]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>