session_start();
include "koneksi.php";

$quiz_id = $_POST['quiz_id'];
$jawaban_user = $_POST['jawaban'];
$jawaban_benar = "A"; // contoh
$skor = 0;

if ($jawaban_user == $jawaban_benar) {
    $skor = 100;
} else {
    $skor = 0;
}

$quiz = $conn->query("SELECT * FROM tb_quiz WHERE id = $quiz_id")->fetch_assoc();

$stmt = $conn->prepare("INSERT INTO tb_quiz_completed 
(user_id, quiz_id, nama_pengguna, judul_quiz, skor, tanggal_selesai)
VALUES (?, ?, ?, ?, ?, ?)");

$stmt->bind_param("iissis",
    $_SESSION['id'], 
    $quiz_id,
    $_SESSION['nama'],
    $quiz['pertanyaan'], 
    $skor,
    date("Y-m-d")
);

$stmt->execute();
