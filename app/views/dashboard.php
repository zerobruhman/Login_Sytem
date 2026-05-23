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
    <a href="index.php?action=logout">Logout</a>

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
                <td>********</td>
                <?php if ($_SESSION['role'] == "admin") :?>
                <td>
                    <form method="POST" action="index.php?action=delete&id=<?= $user['id'] ?>" style="display:inline;">
                        <input type="hidden" name="csrf_token" value="<?= CSRF::GenerateCsrftoken() ?>">
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')" style="color:red;">Hapus</button>
                    </form>
                </td>
                <?php endif;?>
                <td>    
                     <a href="index.php?action=edit&id=<?= $user['id'] ?>">Edit</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>