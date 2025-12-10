<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pertanyaan = $_POST['pertanyaan'];
    $a = $_POST['opsi_a'];
    $b = $_POST['opsi_b'];
    $c = $_POST['opsi_c'];
    $d = $_POST['opsi_d'];
    $jawaban = $_POST['jawaban'];

    $stmt = $conn->prepare("INSERT INTO tb_quiz (pertanyaan, opsi_a, opsi_b, opsi_c, opsi_d, jawaban) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $pertanyaan, $a, $b, $c, $d, $jawaban);

    if ($stmt->execute()) {
        header("Location: admin.php");
        exit;
    } else {
        echo "Gagal menambah soal!";
    }
}
?>

<form method="POST">
    Pertanyaan: <br>
    <textarea name="pertanyaan" required></textarea><br><br>

    Opsi A: <input type="text" name="opsi_a" required><br>
    Opsi B: <input type="text" name="opsi_b" required><br>
    Opsi C: <input type="text" name="opsi_c" required><br>
    Opsi D: <input type="text" name="opsi_d" required><br>

    Jawaban: <input type="text" name="jawaban" required><br><br>

    <button type="submit">Simpan</button>
</form>
