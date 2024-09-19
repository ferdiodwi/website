<?php

include 'db.php';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    // Cek apakah password dan password2 sama
    if ($password != $password2) {
        echo "<script>alert('Password harus sama!');</script>";
        exit;
    }

    // Cek apakah username sudah ada di database
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Jika username sudah digunakan, tampilkan popup
        echo "<script>alert('Username sudah digunakan, silakan gunakan username lain.');</script>";
        exit;
    }

    // Cek apakah email sudah ada di database
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Jika email sudah digunakan, tampilkan popup
        echo "<script>alert('Email sudah digunakan, silakan gunakan email lain.');</script>";
        exit;
    }

    // Hash password sebelum menyimpannya ke database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Simpan ke database
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    if ($stmt->execute()) {
        echo "<script>alert('Registrasi berhasil!'); window.location.href = 'login.php';</script>";
        exit();
    } else {
        echo "Terjadi kesalahan saat registrasi!";
    }
}
?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="register/css/bootstrap.min.css">
    <link rel="stylesheet" href="register/css/style.css">

    <title>Register</title>
  </head>
  <body>
    <div class="d-lg-flex half">
      <div class="bg order-1 order-md-2" style="background-image: url('register/images/bg_1.jpg');"></div>
      <div class="contents order-2 order-md-1">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 py-5">
              <h3>Register</h3>
              <p class="mb-4">Silakan daftar untuk mendapatkan akun baru.</p>

              <!-- Form registrasi -->
              <form action="register.php" method="POST" onsubmit="return validatePasswords()">
                
                <!-- Username -->
                <div class="form-group first">
                  <label for="username">Username</label>
                  <input type="text" name="username" class="form-control" placeholder="Username" id="username" required>
                </div>

                <!-- Email -->
                <div class="form-group first">
                  <label for="email">Email Address</label>
                  <input type="email" name="email" class="form-control" placeholder="your-email@gmail.com" id="email" required>
                </div>

                <!-- Password -->
                <div class="form-group first">
                  <label for="password">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Password" id="password" required>
                </div>

                <!-- Re-type Password -->
                <div class="form-group first">
                  <label for="password2">Re-type Password</label>
                  <input type="password" name="password2" class="form-control" placeholder="Masukan Ulang Password" id="password2" required>
                </div>

                <!-- Checkbox Show Password -->
                <div class="form-group">
                  <input type="checkbox" onclick="togglePassword()"> Show Password
                </div>

                <!-- Checkbox persetujuan -->
                <div class="d-flex mb-5 mt-4 align-items-center">
                  <label class="control control--checkbox mb-0">
                    <span class="caption">Dengan membuat akun, Anda setuju dengan <a href="#">Syarat & Ketentuan</a> kami dan <a href="#">Kebijakan Privasi</a>.</span>
                    <input type="checkbox" required/>
                    <div class="control__indicator"></div>
                  </label>
                </div>

                <!-- Tombol submit -->
                <input type="submit" value="Register" class="btn px-5 btn-primary">

              </form>

              <!-- Tambahkan tombol login -->
              <div class="mt-4">
                <p>Sudah punya akun? <a href="login.php">Login</a></p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    
    <!-- Tambahkan Script Validasi JavaScript -->
    <script>
      function validatePasswords() {
        var password = document.getElementById('password').value;
        var password2 = document.getElementById('password2').value;
        
        if (password != password2) {
          alert('Password harus sama!');
          return false;
        }
        return true;
      }

      function togglePassword() {
        var password = document.getElementById("password");
        var password2 = document.getElementById("password2");
        if (password.type === "password") {
          password.type = "text";
          password2.type = "text";
        } else {
          password.type = "password";
          password2.type = "password";
        }
      }
    </script>
  </body>
</html>
