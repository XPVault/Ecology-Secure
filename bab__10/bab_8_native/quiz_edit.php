<?php
include "koneksi.php";

$id = $_GET['id'];
$data = $conn->query("SELECT * FROM tb_quiz WHERE id = $id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pertanyaan = $_POST['pertanyaan'];
    $a = $_POST['opsi_a'];
    $b = $_POST['opsi_b'];
    $c = $_POST['opsi_c'];
    $d = $_POST['opsi_d'];
    $jawaban = $_POST['jawaban'];

    $stmt = $conn->prepare("UPDATE tb_quiz 
        SET pertanyaan=?, opsi_a=?, opsi_b=?, opsi_c=?, opsi_d=?, jawaban=? WHERE id=?");
    $stmt->bind_param("ssssssi", $pertanyaan, $a, $b, $c, $d, $jawaban, $id);

    if ($stmt->execute()) {
        header("Location: admin.php");
        exit;
    } else {
        echo "Gagal update!";
    }
}
?>

<form method="POST">
    Pertanyaan: <br>
    <textarea name="pertanyaan" required><?= $data['pertanyaan']; ?></textarea><br><br>

    Opsi A: <input type="text" name="opsi_a" value="<?= $data['opsi_a']; ?>"><br>
    Opsi B: <input type="text" name="opsi_b" value="<?= $data['opsi_b']; ?>"><br>
    Opsi C: <input type="text" name="opsi_c" value="<?= $data['opsi_c']; ?>"><br>
    Opsi D: <input type="text" name="opsi_d" value="<?= $data['opsi_d']; ?>"><br>

    Jawaban: <input type="text" name="jawaban" value="<?= $data['jawaban']; ?>"><br><br>

    <button type="submit">Update</button>
</form>
