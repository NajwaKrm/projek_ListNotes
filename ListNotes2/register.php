<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="pembungkus">
    <?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($conn->query($query) === TRUE) {
        echo '<script>alert("Registrasi berhasil")</script>';
    } else {
        echo '<script>alert("Error: ' . $query . '<br>' . $conn->error . '")</script>';
    }
}

$conn->close();
?>


        <div class="isi">
            <p>LISTNOTE</p>
            <form action="" method="post">
            <label for="username"></label>
            <input type="text" id="username" name="username" placeholder="Username" required> 

            <label for="password"></label>
            <input type="password" id="password" name="password" placeholder="Password" required>

            <button type="submit" class="login-btn">Daftar</button>
            </form>
            <span class="register-link">Sudah punya akun? <a href="login.php">Sign In</a></span>

    </div>
    
</body>
</html>