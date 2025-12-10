<?php
session_start();
include "koneksi.php";

$nama     = trim($_POST['nama']);
$email    = trim($_POST['email']);
$password = trim($_POST['password']);

if (empty($nama) || empty($email) || empty($password)) {
    echo "<script>alert('Semua field wajib diisi');history.back();</script>";
    exit;
}

// Cek email sudah dipakai
$check = $conn->prepare("SELECT id FROM tb_user WHERE email = ?");
$check->bind_param("s", $email);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    echo "<script>alert('Email sudah terdaftar');history.back();</script>";
    exit;
}

// Hash password
$hash = password_hash($password, PASSWORD_DEFAULT);

// INSERT ke tb_user
$insert = $conn->prepare("INSERT INTO tb_user (nama, email, password) VALUES (?, ?, ?)");
$insert->bind_param("sss", $nama, $email, $hash);

if ($insert->execute()) {
    echo "<script>alert('Registrasi berhasil');window.location='login.php';</script>";
} else {
    echo "<script>alert('Registrasi gagal');history.back();</script>";
}
?>
