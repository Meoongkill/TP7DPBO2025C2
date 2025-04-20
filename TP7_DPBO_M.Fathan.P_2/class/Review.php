<?php
// models/Review.php
require_once __DIR__ . '/../config/configuration.php';

class Review {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT reviews.*, users.username FROM reviews JOIN users ON reviews.user_id = users.user_id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO reviews (rental_id, user_id, rating, comment) VALUES (?, ?, ?, ?)");
        return $stmt->execute([
            $data['rental_id'],
            $data['user_id'],  // ini harus ditambahkan
            $data['rating'],
            $data['comment']
        ]);
        
    }

    public function getByRentalId($rental_id) {
        $stmt = $this->db->prepare("SELECT * FROM reviews WHERE rental_id = ?");
        $stmt->execute([$rental_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM reviews WHERE review_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE reviews SET rating = ?, comment = ? WHERE review_id = ?");
        return $stmt->execute([
            $data['rating'],
            $data['comment'],
            $id
        ]);
    }

    public function getByUserId($user_id) {
        $stmt = $this->db->prepare("SELECT * FROM reviews WHERE user_id = ?");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRentalbyName($rental_id) {
        $stmt = $this->db->prepare("SELECT rentals.*, users.username FROM rentals JOIN users ON rentals.user_id = users.user_id WHERE rental_id = ?");
        $stmt->execute([$rental_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM reviews WHERE review_id = ?");
        return $stmt->execute([$id]);
    }
}
?>