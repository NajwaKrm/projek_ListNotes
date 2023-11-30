<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="pembungkus">
    <?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Set session
            session_start();
            $_SESSION['username'] = $username;
            header("Location: index.php"); // Ganti dengan halaman setelah login
            exit();
        } else {
            echo '<script>alert("Login gagal. Password salah.")</script>';
        }
    } else {
        echo '<script>alert("Login gagal. Pengguna tidak ditemukan.")</script>';
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

            <button type="submit" class="login-btn">Masuk</button>
            </form>
            <span class="register-link">Belum punya akun? <a href="register.php">Sign Up</a></span>

    </div>
    
</body>
</html>