<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">

<head>
   <title>EcoSecure</title>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="index.css">
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
                    <?php if (isset($_SESSION['username'])): ?>
                        <li><a href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                    <?php endif; ?>
                </ul>
            </section>   
        </nav>
    </header>

    <section class="awal">
        <h1>Selamat datang di EcoSecure</h1>
        <?php
        if (isset($_SESSION['username'])) {
            echo "<p>Hai, <b>" . htmlspecialchars($_SESSION['username']) . "</b>! Selamat datang kembali</p>";
        } else {
            echo "<p>Silakan login untuk mengakses fitur lengkap EcoSecure.</p>";
        }
        ?>
    </section>

    <section class="penjelasan">
        <div>
            <img src="assets/logo.png" alt="logo" width="100px">
        </div>
        <div>
            <h3>EcoSecure</h3>
            <p>Merupakan kepanjangan dari Ecology Secure, Ecology adalah ilmu lingkungan dan energi sedangkan Secure adalah keamanan. Website ini merupakan edukasi interaktif terkait <b>Lingkungan, Energi</b> dan <b>Keamanan Siber</b>.</p>
        </div>
    </section>

    <main>
        <section class="lingkungan">
            <h3>Lingkungan dan Energi</h3>
            <p>Pelajari cara menghemat energi, menjaga lingkungan, dan mendukung energi terbarukan.</p>
        </section>

        <section class="keamanan">
            <h3>Keamanan Digital</h3>
            <p>Kenali ancaman siber seperti Phishing, Malware, dan cara melindungi data pribadi.</p>
        </section>
       
        <a href="edukasi.php" class="btn">Lihat selengkapnya</a> 
    </main>

    <br>
    <script src="index.js"></script>

    <!-- Style Toast -->
    <style>
        .toast {
            visibility: hidden;
            min-width: 250px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 5px;
            padding: 12px;
            position: fixed;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            transition: opacity 0.5s, visibility 0.5s;
            opacity: 0;
            z-index: 9999;
        }
        .toast.show {
            visibility: visible;
            opacity: 1;
        }
    </style>

    <footer>&copy; 2025 EcoSecure | By M. Arif Setya Utama</footer>
</body>
</html>
