<?php
require_once "koneksi.php";

session_start();
if (isset($_POST['login'])) {
    $username = trim($_POST['username']) ?? "";
    $password = trim($_POST['password']) ?? "";

    if (!empty($username) && !empty($password)) {
        $pernyataan = mysqli_prepare($koneksi, "SELECT * FROM users WHERE username = ?");
        mysqli_stmt_bind_param($pernyataan, "s", $username);
        if (mysqli_stmt_execute($pernyataan)) {
            $hasil = mysqli_stmt_get_result($pernyataan);
            $user = mysqli_fetch_assoc($hasil);

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $_SESSION['login'] = true;
                    $_SESSION['username'] = $user['username'];
                    $pesan = "Login Berhasil!";
                    header("Location: dashboard.php");
                    exit(0);
                }
                else {
                    $pesan = "Username atau Password salah";
                }
            }
            else {
                $pesan = "$username tidak terdaftar!";
            }
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
    <title>Login Account</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <br>
        <button type="submit" name="login">Login</button>
        <p><strong><?=$pesan?> </strong></p>
    </form>
</body>
</html>