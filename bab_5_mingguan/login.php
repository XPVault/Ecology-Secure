<?php
session_start();

// Kalau form login dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Cek apakah user sudah pernah register
    if (isset($_SESSION['registered_user'])) {
        $registered = $_SESSION['registered_user'];

        // Cek kecocokan username dan password
        if (($user === $registered['username'] || $user === $registered['email']) && $pass === $registered['password']) {
            $_SESSION['username'] = $registered['fullname']; // Simpan nama untuk dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<script>alert('Username atau password salah!');</script>";
        }
    } else {
        echo "<script>alert('Belum ada akun terdaftar! Silakan registrasi dulu.'); window.location='register.php';</script>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Login EcoSecure</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<header>
    <nav><h1>EcoSecure</h1>
        <section class="">
            <ul>
                <li class="Beranda"><a href="index.php">Beranda</a></li>
                <li><a href="edukasi.php">Edukasi</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
            </ul>
        </section>
        <section class="">
            <ul>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            </ul>
        </section>
    </nav> 
</header>

<main>
    <section class="grid-container">
        <h1>Login Akun EcoSecure</h1><br>
        <p>"Untuk lanjut ke menu dashboard silahkan login terlebih dahulu"</p>
    </section>

    <section> 
        <div class="login"> 
            <form action="" method="POST">
                <label for="username">Username / Email</label><br>
                <input type="text" id="username" name="username" required><p></p>
                
                <label for="password">Password</label><br>
                <input type="password" id="password" name="password" required><br><br>
                <button type="submit" class="btn">Login</button>
                <p><h5>Belum punya akun? Silakan <a href="register.php" class="Daftar">Daftar di sini</a></h5></p><br>
            </form>
        </div>
    </section>
</main>

<footer>&copy; 2025 EcoSecure | By M. Arif Setya Utama</footer>
</body> 
</html>
