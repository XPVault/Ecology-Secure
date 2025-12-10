<?php
include "koneksi.php";

$id = $_GET['id'];
$conn->query("DELETE FROM tb_quiz WHERE id = $id");

header("Location: admin.php");
exit;
?>
