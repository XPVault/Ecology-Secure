<?php
session_start();
include "koneksi.php";

$email    = trim($_POST['email']);
$password = trim($_POST['password']);

if (empty($email) || empty($password)) {
    echo "<script>alert('Semua field wajib diisi');history.back();</script>";
    exit;
}

// Ambil user berdasarkan email
$stmt = $conn->prepare("SELECT id, nama, password FROM tb_user WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();

    // Cek password
    if (password_verify($password, $row['password'])) {

        // Set session
        $_SESSION['id']   = $row['id'];
        $_SESSION['nama'] = $row['nama'];

        echo "<script>alert('Login berhasil');window.location='dashboard.php';</script>";
        exit;
    }
}

echo "<script>alert('Email atau password salah');history.back();</script>";
exit;
?>
