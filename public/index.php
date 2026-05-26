<?php
session_start();

require_once __DIR__ . "/../app/controllers/AuthController.php";
require_once __DIR__ . "/../app/controllers/DashboarController.php";
require_once __DIR__ . "/../core/CSRF.php";

$auth = new AuthController();
$dashboard = new DashboarController();
$action = $_GET['action'] ?? "login";

switch ($action) {
    case "login":
        $auth->login();
        break;
    case "register":
        $auth->register();
        break;
    case "dashboard":
        $dashboard->index();
        break;
    case "logout":
        $auth->logout();
        break;
    case "delete":
        var_dump($_POST);
        var_dump($_GET);
        var_dump($_SESSION);
        if ($_SERVER['REQUEST_METHOD'] !== "POST") {
            http_response_code(405);
            die("Method tidak di izinkan");
        }
        CSRF::verifyCsrfToken();
        $id = $_POST['id'] ?? null;
        $dashboard->hapusUser($id);
        break;
    case "edit":
        $id = $_GET['id'] ?? null;
        $dashboard->updateUser($id);
        break;
    default:
        $auth->login();
        break;
}
?>