<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #23395d;
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .login-form {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 300px;
      text-align: center;
    }

    .login-form h2 {
      color: #23395d;
    }

    .form-group {
      margin-bottom: 20px;
      text-align: left;
    }

    .form-group label {
      display: block;
      text-align: left;
      margin-bottom: 3px;
    }

    .form-group input {
      width: 100%;
      padding: 8px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .form-group button {
      background-color: #23395d;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

  </style>
</head>
<body>

  <div class="login-form">
    <h2>Login</h2>
    <form action="#" method="post">
      <div class="form-group">
        <label for="username" style="color:#23395d; font-weight:bold">Username:</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="password" style="color:#23395d; font-weight:bold">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <button type="submit">Login</button>
        <p style="color: black;">Don't have account ? <a href="signup.php">Signup</a></p>
      </div>
    </form>
  </div>

</body>
</html>
