<?php
session_start();
include "koneksi.php"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirm = trim($_POST['confirm_password']);

    if ($password !== $confirm) {
        echo "<script>alert('Konfirmasi password tidak cocok!');</script>";
        exit;
    }

    $check = $conn->prepare("SELECT id FROM tb_user WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo "<script>alert('Email sudah terdaftar!');</script>";
        exit;
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $insert = $conn->prepare(
        "INSERT INTO tb_user (nama, email, password) VALUES (?, ?, ?)"
    );
    $insert->bind_param("sss", $fullname, $email, $hash);

    if ($insert->execute()) {
        echo "<script>
            alert('Registrasi berhasil! Silakan login.');
            window.location.href = 'login.php';
        </script>";
        exit;
    } else {
        echo "<script>alert('Registrasi gagal!');</script>";
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <title>Register EcoSecure</title>
    <link rel="stylesheet" href="register.css">
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

<h1 class="label_registrasi">Daftar Akun EcoSecure</h1>

<main>
    <section class="daftar">
        <form action="" method="post">
            <label for="fullname">Nama Lengkap</label><p></p>
            <input type="text" id="fullname" name="fullname" required><p></p>

            <label for="email">Email</label><p></p>
            <input type="text" id="email" name="email" required><p></p>

            <label for="username">Username</label><p></p>
            <input type="text" id="username" name="username" required><p></p>

            <label for="password">Password</label><p></p>
            <input type="password" id="password" name="password" required><p></p>

            <label for="confirm_password">Confirm Password</label><p></p>
            <input type="password" id="confirm_password" name="confirm_password" required><p></p>
            
            <button type="submit" class="btn">Daftar</button>
            <p><h5>Sudah punya akun? Silakan <a href="login.php">Login di sini</a></h5></p>
        </form>
    </section>
</main>

<footer>&copy; 2025 EcoSecure | By M. Arif Setya Utama</footer>
</body>
</html>
