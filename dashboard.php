<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("location: login.php");
    exit(1);
}
echo "Halo {$_SESSION['username']}";
if (isset($_GET['logout'])) {
    session_destroy();
    header("location: login.php");
    exit(1);
}
?>
<form method="GET">
    <button type="submit" name="logout">Logout</button>
</form>