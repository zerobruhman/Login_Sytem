<?php
require_once __DIR__ . "/../../core/Database.php";

class User {
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->koneksi;        
    }
    public function register($username, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $perintah_query = "INSERT INTO Users(username, password) VALUES (?, ?)";
        $pernyataan = $this->db->prepare($perintah_query);
        $pernyataan->bind_param(
            "ss",
            $username,
            $hash
        );
        return $pernyataan->execute();
    }
    public function cariUser($username) {
        $perintah_query = "SELECT * FROM Users WHERE username = ?";
        $pernyataan = $this->db->prepare($perintah_query);
        $pernyataan->bind_param(
            "s",
            $username
        );
        $pernyataan->execute();
        $hasil = $pernyataan->get_result();
        return $hasil->fetch_assoc();
    }
    public function tampilkansemuaUser() {
        $perintah_query = "SELECT * FROM Users";
        $hasil = $this->db->query($perintah_query);
        $data = [];
        while ($row = $hasil->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
}
?>