<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Form</title>
  <link rel="stylesheet" href="../Loginstyle.css" />
</head>
<body>

  <div class="login-container">
        <h1>LOGIN</h1>
        <form action="/login" method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required />
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required />
        </div>
        <div class="forgot">
            <div>
              <input type="checkbox" name="remember" id="remember" class="inline"> 
              <label for="remember" class="inline">Remember Me</label>
            </div>
            <a href="#">Forgot Password?</a>
        </div>
        <button type="submit">Login</button>
        </form>
   </div>
</div>
</body>
</html>