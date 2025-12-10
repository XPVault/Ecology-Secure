<?php
session_start();
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']); 
    $pass  = trim($_POST['password']);

    // Ambil user berdasarkan email
    $stmt = $conn->prepare("SELECT id, nama, email, password FROM tb_user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        if (password_verify($pass, $row['password'])) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['nama'] = $row['nama'];

            echo "<script>
                    alert('Login berhasil!');
                    window.location='dashboard.php';
                  </script>";
            exit();
        } else {
            echo "<script>alert('Password salah!');</script>";
        }
    } else {
        echo "<script>alert('Email tidak ditemukan!');</script>";
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
                <input type="email" id="email" name="email" required><p></p>
                
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
