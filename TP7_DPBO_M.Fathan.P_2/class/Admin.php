<?php
// models/Admin.php
require_once __DIR__ . '/../config/configuration.php';

class Admin {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function login($username, $password) {
        $stmt = $this->db->prepare("SELECT * FROM admins WHERE username = ?");
        $stmt->execute([$username]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin && password_verify($password, $admin['password'])) {
            return $admin;
        }
        return false;
    }

    public function getAllAdmins() {
        $stmt = $this->db->query("SELECT * FROM admins");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAdminById($id) {
        $stmt = $this->db->prepare("SELECT * FROM admins WHERE admin_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createAdmin($data) {
        $stmt = $this->db->prepare("INSERT INTO admins (username, password) VALUES (?, ?)");
        return $stmt->execute([
            $data['username'],
            password_hash($data['password'], PASSWORD_BCRYPT)
        ]);
    }

    public function updateAdmin($id, $data) {
        $stmt = $this->db->prepare("UPDATE admins SET username = ?, password = ? WHERE admin_id = ?");
        return $stmt->execute([
            $data['username'],
            password_hash($data['password'], PASSWORD_BCRYPT),
            $id
        ]);
    }

    public function deleteAdmin($id) {
        $stmt = $this->db->prepare("DELETE FROM admins WHERE admin_id = ?");
        return $stmt->execute([$id]);
    }

    public function changePassword($id, $newPassword) {
        $stmt = $this->db->prepare("UPDATE admins SET password = ? WHERE admin_id = ?");
        return $stmt->execute([
            password_hash($newPassword, PASSWORD_BCRYPT),
            $id
        ]);
    }

    public function getAdminByUsername($username) {
        $stmt = $this->db->prepare("SELECT * FROM admins WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>