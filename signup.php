<?php
require_once __DIR__ . '/vendor/autoload.php';

$databaseConnection = new MongoDB\Client('mongodb://localhost:27017');

$myDatabase = $databaseConnection->picture_search;

$userCollection = $myDatabase->users; 

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup Form</title>
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

    .signup-form {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 300px;
      text-align: center;
    }

    .signup-form h2 {
      color: #23395d;
    }

    .form-group {
      margin-bottom: 20px;
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
  <div>
    <?php 

if (isset($_POST['signup'])) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = sha1($_POST['password']);

  $data = array(
      "name" => $name,
      "Email" => $email,
      "Password" => $password
  );

  // insert into MongoDB Users Collection
  $insert = $userCollection->insertOne($data);

  if ($insert) {
      ?>
      <center><h4 style="color: green;">Successfully Registered</h4></center>
      <center><a href="login.php">Login</a></center>
      <?php
  } else {
      ?>
      <center><h4 style="color: red;">Registration Failed</h4></center>
      <center><h4 style="color: red;">Try Again</h4></center>
      <?php
  }
}
    ?>
  </div>
  <div class="signup-form">
    <h2>Signup</h2>
    <form action="#" method="post">
      <div class="form-group">
        <label for="name" style="color:#23395d; font-weight:bold">Name:</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="email" style="color:#23395d; font-weight:bold">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password" style="color:#23395d; font-weight:bold">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
      <button type="submit" name="signup">Sign Up</button>
        <p style="color: black;">Already have account ? <a href="login.php">Login</a></p>  
      </div>
    </form>
  </div>

</body>
</html>
