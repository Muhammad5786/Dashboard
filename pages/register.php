<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register</title>
  <link rel="stylesheet" href="../Loginstyle.css" />
</head>
<body>
  <div class="login-container">
    <h1>REGISTER</h1>
    <form action="../php/aksi_simpan_register.php" method="POST">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required />
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required />
      </div>

      <div class="form-group">
        <label for="confirm_password">Konfirmasi Password</label>
        <input type="password" id="confirm_password" name="confirm_password" required />
      </div>

      <button type="submit">Daftar</button>

      <p class="mt-3">Sudah punya akun? <a href="login.php">Login di sini</a></p>
    </form>
  </div>
</body>
</html>
