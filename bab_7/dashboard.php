<?php
session_start();

if (!isset($_SESSION['nama'])) {
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="id">

<head>
    <title>Dashboard EcoSecure</title>
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>
    <header>
        <nav><h1>EcoSecure</h1>
            <section class="">
                <ul>
                    <li class="Beranda"><a href="index.php">Beranda</a></li>
                    <li><a href="edukasi.php">Edukasi</a></li>
                    <li><a href="dashboard.php">Dashboard</a></li>
                </ul>
            </section>
            <section class="">
                <ul>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </section>
        </nav> 
    </header>

    <main>
        <section class="dashboard">
            <h1>Dashboard EcoSecure</h1>
            <h3>Halo, <?php echo $_SESSION['nama']; ?></h3>
        </section>

        <section class="welcome">
            <h2>Selamat datang di EcoSecure</h2>
            <p>Platform edukasi terkait <b>Lingkungan dan Energi Hijau</b> yang juga membekali kita dengan pengetahuan dasar <b>Cyber Security.</b></p>
        </section>

        <section class="grid-container">
            <div class="energi_hijau">
                <h3>Energi Hijau</h3>
                <p>Terkait Energi Terbarukan, Matahari, Angin, Air, Biomassa</p>
                <a href="energi_hijau.html" class="energy_btn">Pelajari selengkapnya</a>
            </div>

            <div class="cyber_security">
                <h3>Cyber Security</h3>
                <p>Mempelajari dasar keamanan digital, Password kuat, Phishing, & Privasi data.</p>
                <a href="cyber_security.html" class="cyber_btn">Mulai Mempelajari</a>
            </div>

            <div class="ecology_tips">
                <h3>Ecology Tips</h3>
                <p>Tips sederhana menjaga lingkungan, Hemat listrik, Kurangi plastik, Daur ulang.</p>
                <a href="ecology_tips.html" class="ecology_btn">Lihat Tips</a>
            </div>

            <div class="quiz">
                <h3>Quiz</h3>
                <p>Belajar untuk membiasakan diri dengan pertanyaan-pertanyaan seputar lingkungan dan keamanan.</p>
                <a href="quiz.html" class="quiz_btn">Mulai Quiz</a>
            </div>
        </section>
    </main>

    <footer>&copy; 2025 EcoSecure | By M. Arif Setya Utama</footer>
</body>
</html>
