<?php
session_start();

// Jika sudah login, langsung ke admin.php
if (isset($_SESSION['admin_login']) && $_SESSION['admin_login'] === true) {
    header("Location: admin.php");
    exit();
}

// Cek saat form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin = $_POST['admin'];
    $password = $_POST['password'];

    // Login sederhana (tanpa database)
    if ($admin === 'admin' && $password === '12345') {
        $_SESSION['admin_login'] = true;
        $_SESSION['admin_name'] = 'Administrator EcoSecure';
        header("Location: admin.php");
        exit();
    } else {
        echo "<script>alert('Username atau password salah!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <title>EcoSecure | Admin Login</title>
  <link rel="stylesheet" href="login_admin.css">
</head>
<body>

  <header>
    <h1>Admin EcoSecure</h1>
    <nav>
      <a href="login_admin.php">Login</a>
    </nav>
  </header>

  <main>
    <section> 
        <div class="login"> 
            <form method="POST" action="">
                <label for="admin">Admin</label><br>
                <input type="text" id="admin" name="admin" required><p></p>
                
                <label for="password">Password</label><br>
                <input type="password" id="password" name="password" required><br><br>

                <button type="submit" class="btn">Login</button>
            </form>
        </div>
    </section>
  </main>

  <footer>&copy; 2025 EcoSecure | By M. Arif Setya Utama</footer>
</body>
</html>
