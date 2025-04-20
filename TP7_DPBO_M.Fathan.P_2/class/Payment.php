<?php
// models/Payment.php
require_once __DIR__ . '/../config/configuration.php';

class Payment {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT payments.*, rentals.rental_id FROM payments JOIN rentals ON payments.rental_id = rentals.rental_id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO payments (rental_id, payment_method, amount, payment_date, payment_status) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['rental_id'],
            $data['payment_method'],
            $data['amount'],
            $data['payment_date'],
            $data['payment_status']
        ]);
    }

    public function getByRentalId($rental_id) {
        $stmt = $this->db->prepare("SELECT * FROM payments WHERE rental_id = ?");
        $stmt->execute([$rental_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM payments WHERE payment_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE payments SET rental_id = ?, payment_method = ?, amount = ?, payment_date = ?, payment_status = ? WHERE payment_id = ?");
        return $stmt->execute([
            $data['rental_id'],
            $data['payment_method'],
            $data['amount'],
            $data['payment_date'],
            $data['payment_status'],
            $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM payments WHERE payment_id = ?");
        return $stmt->execute([$id]);
    }

    public function getByUserId($user_id) {
        $stmt = $this->db->prepare("SELECT * FROM payments WHERE user_id = ?");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByName($username) {
        $stmt = $this->db->prepare("SELECT * FROM payments WHERE name = ?");
        $stmt->execute([$username]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>