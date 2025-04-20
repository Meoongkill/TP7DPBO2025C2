<?php
// models/Schedule.php
require_once __DIR__ . '/../config/configuration.php';

class Schedule {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT schedules.*, girlfriends.name FROM schedules JOIN girlfriends ON schedules.girlfriend_id = girlfriends.girlfriend_id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO schedules (girlfriend_id, available_date, start_time, end_time) VALUES (?, ?, ?, ?)");
        return $stmt->execute([
            $data['girlfriend_id'],
            $data['available_date'],
            $data['start_time'],
            $data['end_time']
        ]);
    }

    public function getByGirlfriendId($girlfriend_id) {
        $stmt = $this->db->prepare("SELECT * FROM schedules WHERE girlfriend_id = ?");
        $stmt->execute([$girlfriend_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM schedules WHERE schedule_id = ?");
        return $stmt->execute([$id]);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE schedules SET girlfriend_id = ?, available_date = ?, start_time = ?, end_time = ? WHERE schedule_id = ?");
        return $stmt->execute([
            $data['girlfriend_id'],
            $data['available_date'],
            $data['start_time'],
            $data['end_time'],
            $id
        ]);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM schedules WHERE schedule_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>