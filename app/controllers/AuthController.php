<?php
require_once __DIR__ . "/../models/User.php";

class AuthController {
    private $modeluser;

    public function __construct()
    {
        $this->modeluser = new User();
    }
    public function register() {
        if (isset($_POST['register'])) {
            $username = trim($_POST['username']) ?? "";
            $password = trim($_POST['password']) ?? "";

            $this->validate_register($username, $password);
            $this->modeluser->register($username, $password);
            echo "Register berhasil";
            header("Location: /public/index.php?action=login");
            exit;
        }
        require __DIR__ . "/../views/auth/register.php";
    }
    public function login() {
        if (isset($_POST['login'])) {
            CSRF::validateCSRFtoken();
            $username = trim($_POST['username']) ?? "";
            $password = trim($_POST['password']) ?? "";

            $this->validate_login($username, $password);
        }
        require __DIR__ . "/../views/auth/login.php";
    }
    public function logout() {
        session_destroy();

        header("Location: /public/index.php?action=login");
        exit(0);
    }
    private function validate_register($username, $password) {
        if (empty($username) && empty($password))
            die("Input tolong di isi");
        if (strlen($password) < 8)
            die("Password minimal 8 karakter");
    }
    private function validate_login($username, $password) {
        if (empty($username))
            die("Username tolong di isi");
        if (empty($password))
            die("Password tolong di isi");
        $user = $this->modeluser->cariUser($username);
        if (!$user) {
            die("User tidak terdaftar");
        }
        if (password_verify($password, $user['password'])) { 
            $_SESSION['login'] = true;
            $_SESSION['username'] = $user["username"];

            print_r ("Login berhasil!");
            header("Location: /public/index.php?action=dashboard");
            exit();
        }
        else {
            echo "Login gagal! Username atau Password salah!";
        }
    } 
}
?>