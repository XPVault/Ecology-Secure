<?php
include "koneksi.php";

$id = $_GET['id'];
$data = $conn->query("SELECT * FROM tb_quiz_completed WHERE id = $id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $quiz_id = $_POST['quiz_id'];
    $nama = $_POST['nama_pengguna'];
    $judul = $_POST['judul_quiz'];
    $skor = $_POST['skor'];
    $tgl = $_POST['tanggal_selesai'];

    $stmt = $conn->prepare("UPDATE tb_quiz_completed 
        SET user_id=?, quiz_id=?, nama_pengguna=?, judul_quiz=?, skor=?, tanggal_selesai=? 
        WHERE id=?");

    $stmt->bind_param("iissisi", $user_id, $quiz_id, $nama, $judul, $skor, $tgl, $id);

    if ($stmt->execute()) {
        header("Location: admin.php");
        exit;
    } else {
        echo "Gagal update!";
    }
}
?>

<form method="POST">
    User ID: <input type="number" name="user_id" value="<?= $data['user_id']; ?>"><br>
    Quiz ID: <input type="number" name="quiz_id" value="<?= $data['quiz_id']; ?>"><br>
    Nama Pengguna: <input type="text" name="nama_pengguna" value="<?= $data['nama_pengguna']; ?>"><br>
    Judul Quiz: <input type="text" name="judul_quiz" value="<?= $data['judul_quiz']; ?>"><br>
    Skor: <input type="number" name="skor" value="<?= $data['skor']; ?>"><br>
    Tanggal Selesai: <input type="date" name="tanggal_selesai" value="<?= $data['tanggal_selesai']; ?>"><br>
    <button type="submit">Update</button>
</form>
