# Login System dengan PHP + MySQL
## Setup `koneksi.php`
```php
<?php
class Database {
    private $host = "namahostkamu";
    private $user = "namauserkamu";
    private $pass = "passwordkamu";
    private $db   = "namadbkamu";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);

        if ($this->conn->connect_error) {
            die("Koneksi Gagal: " . $this->conn->connect_error);
        }
    }
}

$db_baru = new Database(); 
$db_baru->conn->query("SELECT * FROM users"); 
?>
```
