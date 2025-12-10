<?php
include "koneksi.php";

$id = $_GET['id'];
$user = $conn->query("SELECT * FROM tb_user WHERE id = $id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("UPDATE tb_user SET nama=?, email=? WHERE id=?");
    $stmt->bind_param("ssi", $nama, $email, $id);

    if ($stmt->execute()) {
        header("Location: admin.php");
        exit;
    } else {
        echo "Gagal update!";
    }
}
?>

<form method="POST">
  Nama: <input type="text" name="nama" value="<?= $user['nama']; ?>"><br>
  Email: <input type="email" name="email" value="<?= $user['email']; ?>"><br>
  <button type="submit">Update</button>
</form>
