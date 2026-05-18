<?php
session_start();

require_once __DIR__ . "/../app/controllers/AuthController.php";
require_once __DIR__ . "/../app/controllers/DashboarController.php";

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
        $id = $_GET['id'] ?? null;
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