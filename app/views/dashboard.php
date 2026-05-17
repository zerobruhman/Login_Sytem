<?php
$users = $users ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>

    Halo: <p><strong><?= $_SESSION['username']; ?></strong></p>
    <a href="/public/index.php?action=logout">Logout</a>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user):?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= htmlspecialchars($user['username']) ?></td>
                <td><?= $user['password'] ?></td>
                <td>
                    <a href="?action=delete&id=<?= $user['id'] ?>" 
                    class="btn-hapus"
                    onclick="return confirm('Yakin ingin menghapus data ini?')" 
                    style="color: red; text-decoration: none; font-weight: bold;">
                    Hapus
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>