<?php
require __DIR__ . '/vendor/autoload.php';

$databaseConnection = new MongoDB\Client('mongodb+srv://kalpraj51:rBKe0Qr0ba9M1VyM@cluster0.zhl61c1.mongodb.net/?retryWrites=true&w=majority');
// $databaseConnection = new MongoDB\Client('mongodb+srv://kalpraj51:ZPqjW2AbcL9BMLG7@cluster0.zhl61c1.mongodb.net/?retryWrites=true&w=majority');

// mongodb+srv://kalpraj51:rBKe0Qr0ba9M1VyM@cluster0.zhl61c1.mongodb.net/?retryWrites=true&w=majority

$myDatabase = $databaseConnection->picture_search;

$userCollection = $myDatabase->users; 

if (isset($_POST['signup'])) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = sha1($_POST['password']);

  $data = array(
      "Name" => $name,
      "Email" => $email,
      "Password" => $password
  );

  // insert into MongoDB Users Collection
  $insert = $userCollection->insertOne($data);

  if ($insert) {
    echo '<div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> You have successfully registered !
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>';
echo '<script>setTimeout(function() { 
    document.getElementById("alert").style.display = "none"; 
    window.location.href = "login.php"; 
}, 1090);</script>';
  } else {
    echo '<div id="alert" class="alert alert-danger alert-dismissible fade show" role="alert">
    Registration Failed !
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="website icon" type="png" href="icon.png">
  <title>Signup Form</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #23395d;
      color: #fff;
      height: 100vh;
    }

    .signup-form {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 350px;
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
<div style="display: flex;
      align-items: center;
      justify-content: center;">
  <div class="signup-form" style=" margin-top: 20vh;">
  <p style="color:#23395d; font-weight:bold; font-size: 20px;">Signup</p>
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
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
