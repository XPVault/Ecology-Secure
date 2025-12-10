<?php
$done = $conn->query("SELECT * FROM tb_quiz_completed ORDER BY id DESC");
?>
<tbody>
<?php while ($row = $done->fetch_assoc()): ?>
<tr>
    <td><?= $row['id']; ?></td>
    <td><?= $row['nama_pengguna']; ?></td>
    <td><?= $row['judul_quiz']; ?></td>
    <td><?= $row['skor']; ?></td>
    <td><?= $row['tanggal_selesai']; ?></td>
    <td>
        <a href="completed_edit.php?id=<?= $row['id']; ?>"><button>Edit</button></a>
        <a href="completed_hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Hapus data ini?')">
            <button>Hapus</button>
        </a>
    </td>
</tr>
<?php endwhile; ?>
</tbody>

