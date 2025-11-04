<?php
session_start();

// Cek apakah user sudah login
$isLoggedIn = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edukasi EcoSecure</title>
    <link rel="stylesheet" href="edukasi.css">
</head>
<body>
<header>
    <nav>
        <h1>EcoSecure</h1>
        <section class="">
            <ul>
                <li class="Beranda"><a href="index.php">Beranda</a></li>
                <li><a href="edukasi.php">Edukasi</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
            </ul>
        </section>
        <section class="">
            <ul>
                <?php if ($isLoggedIn): ?>
                    <li><a href="logout.php">Logout</a></li>
                    <li><b>Halo, <?php echo htmlspecialchars($_SESSION['username']); ?></b></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                <?php endif; ?>
            </ul>
        </section>   
    </nav>
</header>

<main>
    <section class="card_atas">
        <h2>Edukasi Lingkungan, Energi, dan Keamanan Siber</h2>
        <p>
            Halaman edukasi ini memberikan gambaran umum tentang pentingnya menjaga 
            <b>Lingkungan</b>, mendukung <b>Energi terbarukan</b>, serta meningkatkan kesadaran akan 
            <b>Keamanan digital</b>.
        </p>
        <br>
    </section>

    <section class="lingkungan">
        <h3>Lingkungan</h3>
        <p>Memahami dampak sampah plastik, pentingnya penghijauan, serta cara menjaga kebersihan alam.</p>
        <br>
    </section>

    <section class="energi">
        <h3>Energi</h3>
        <p>Mengenal energi terbarukan seperti tenaga surya, angin, air, dan biomassa sebagai solusi masa depan.</p>
        <br>
    </section>

    <section class="keamanan">
        <h3>Keamanan Siber</h3>
        <p>Pengenalan dasar ancaman digital seperti phishing, malware, serta tips membuat password yang kuat.</p>
        <br>
    </section>

    <br>
    <div>
        <?php if ($isLoggedIn): ?>
            <a href="dashboard.php" class="btn">
                <h5>Lihat pembelajaran lanjutan</h5>
            </a>
        <?php else: ?>
            <a href="login.php" class="btn">
                <h5>Silahkan masuk untuk mempelajari lebih detail</h5>
            </a>
        <?php endif; ?>
    </div>
    <br>
</main>

<footer>&copy; 2025 EcoSecure | By M. Arif Setya Utama</footer>
</body>
</html>
