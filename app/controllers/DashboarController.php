<?php
require_once __DIR__ . "/../middleware/AuthMiddleware.php";
require_once __DIR__ . "/../models/User.php";
require_once __DIR__ . "/../middleware/AdminMiddleware.php";
class DashboarController {

    private $usermodel;

    public function __construct()
    {
        $this->usermodel = new User();
    }
    public function index() {
        AuthMiddleware::check();
        

        $users = $this->usermodel->tampilkansemuaUser();
        require __DIR__ . "/../views/dashboard.php";
    }
    public function hapusUser($id) {
        AuthMiddleware::check();
        AdminMiddleware::check();
        CSRF::verifyCsrfToken();

        $this->usermodel->hapusUser($id);
        header("Location: index.php?action=dashboard");
        exit;
    }
    public function updateUser($id) {
        AuthMiddleware::check();
        AdminMiddleware::check();
        
        $user = $this->usermodel->ambilUserberdasarkanid($id);
        $error = null;
        if (isset($_POST['update'])) {
            $username = $_POST['username'] ?? "";
            $error = $this->validate_update($username);

            if (empty($error)) {
                $this->usermodel->updateUser($username, $id);
                header("Location: /public/index.php?action=dashboard");
                exit;   
            }
        }
        require __DIR__ . "/../views/edit.php";
    }
    private function validate_update($username) {
        $usernametrim = trim($username);
        if (empty($usernametrim)) 
            return "Username tidak boleh kosong!";
    }
}
?>