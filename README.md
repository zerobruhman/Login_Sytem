# Login System dengan PHP + MySQL
## Setup 
### Database `sql`
```sql
CREATE TABLE Users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
)
```
### `core/Database.php`
```php
class Database {
    private $host = "";
    private $nama = "";
    private $password = "";
    private $nama_db = "";

    public $koneksi;

    public function __construct()
    {
        $this->koneksi = mysqli_connect(
            $this->host,
            $this->nama,
            $this->password,
            $this->nama_db
        );
        if (!$this->koneksi) {
            die("Koneksi gagal");
        }
    }
}
```
## Struktur Folder
```
project/
│
├── app/
│   ├── controllers/
│   │   ├── AuthController.php
│   │   └── DashboardController.php
│   │
│   ├── models/
│   │   └── User.php
│   │
│   ├── views/
│   │   ├── auth/
│   │   │  ├── login.php
│   │   │  └── register.php
│   │   └── dashboard.php
│   ├── moddleware/
│       └── AuthMiddleware.php
│
├── core/
│   └── Database.php
│   
│
├── public/
│   └── index.php
│
```
