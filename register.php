<?php
require_once "koneksi.php";

session_start();
if (isset($_POST['register'])) {
    $username = trim($_POST['username']) ?? "";
    $password = trim($_POST['password']) ?? "";

    if (!empty($username) && !empty($password)) {
        $passwordhash = password_hash($password, PASSWORD_DEFAULT);

        $pernyataan = mysqli_prepare($koneksi, "INSERT INTO users(username, password) VALUES(?, ?)");
        mysqli_stmt_bind_param($pernyataan, "ss", $username, $passwordhash);
        if (mysqli_stmt_execute($pernyataan)) {
            $pesan = "Berhasil!";
        }
        else {
            $pesan = "Gagal!";
        }
        mysqli_stmt_close($pernyataan);
    }
    else {
        $pesan = "Username dan Password tidak boleh kosong";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Account</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <br>
        <button type="submit" name="register">Register</button>
        <p><strong><?php if($pesan) {
            echo $pesan;
        }?> </strong></p>
    </form>
</body>
</html>