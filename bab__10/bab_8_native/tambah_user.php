<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO tb_user (nama, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nama, $email, $password);

    if ($stmt->execute()) {
        header("Location: admin.php");
        exit;
    } else {
        echo "Gagal menambah data!";
    }
}
?>

<form method="POST">
  Nama: <input type="text" name="nama"><br>
  Email: <input type="email" name="email"><br>
  Password: <input type="password" name="password"><br>
  <button type="submit">Simpan</button>
</form>
