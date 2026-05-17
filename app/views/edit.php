<?php
$user = $user ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h1>Edit</h1>
    <form method="POST">
        <input
            type="text"
            name="username"
            value="<?= htmlspecialchars($user['username']) ?>"
        >
        <br><br>
        <button name="update">
            Update
        </button>
    </form>
    <?php if ($user['username'] === null) {
        echo "Kosong";
    }
    else {
        echo "Ada {$user['username']} ";
    };?>
</body>
</html>