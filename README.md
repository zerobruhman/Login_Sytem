# Login System dengan PHP + MySQL

Simple Login System menggunakan PHP Native dengan konsep MVC, MySQL, Session, dan Prepared Statement.
Project ini dibuat untuk belajar backend fundamental sebelum masuk ke framework seperti Laravel.
---

## Konsep yang Dipelajari

* MVC Pattern
* Routing sederhana
* Session-based authentication
* Middleware protection
* Database interaction
* Secure password handling
* Separation of concerns

---

## Features

- Register user
- Login system
- Logout system
- Session authentication
- Middleware auth (protected route)
- MVC architecture
- Prepared statements (anti SQL injection)
- Password hashing (password_hash & password_verify)
- Dashboard user listing

---

## Tech Stack

- PHP 
- MySQL

---

## Default Routes

| Page      | URL                  |
| --------- | -------------------- |
| Login     | `/?action=login`     |
| Register  | `/?action=register`  |
| Dashboard | `/?action=dashboard` |
| Logout    | `/?action=logout`    |

---

## Authentication Flow

```
Login → Session dibuat → Akses Dashboard → Middleware check → Logout destroy session
```
---

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
---

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
---

## Notes

* Project ini masih versi belajar (belum production ready)
* Belum ada CSRF protection
* Belum ada role system (admin/user)
* Belum ada validation layer yang lengkap

---

## Future Improvements

* Role-based access (admin/user)
* CSRF protection
* Form validation layer
* Flash messages
