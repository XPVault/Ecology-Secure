<?php
require 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

include "koneksi.php";

// ambil seluruh data user
$data = $conn->query("SELECT * FROM tb_user");

// mulai dompdf
$dompdf = new Dompdf();

$html = "
<h2 style='text-align:center;'>Laporan Data Pengguna EcoSecure</h2>
<table border='1' cellpadding='8' cellspacing='0' width='100%'>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
    </tr>
";

while ($row = $data->fetch_assoc()) {
    $html .= "
    <tr>
        <td>{$row['id']}</td>
        <td>{$row['nama']}</td>
        <td>{$row['email']}</td>
    </tr>";
}

$html .= "</table>";

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// download otomatis
$dompdf->stream("laporan_data_user.pdf", array("Attachment" => 0));
