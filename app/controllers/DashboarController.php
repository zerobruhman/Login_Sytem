<?php
require_once __DIR__ . "/../middleware/AuthMiddleware.php";
require_once __DIR__ . "/../models/User.php";

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
}
?>