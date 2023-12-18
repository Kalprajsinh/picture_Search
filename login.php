<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';

$databaseConnection = new MongoDB\Client('mongodb+srv://kalpraj51:rBKe0Qr0ba9M1VyM@cluster0.zhl61c1.mongodb.net/?retryWrites=true&w=majority');

$myDatabase = $databaseConnection->picture_search;

$userCollection = $myDatabase->users;

if(isset($_POST['login'])){

	$email = $_POST['email'];
  $password = sha1($_POST['password']);

$data = array(
	"Email" => $email,
	"Password" => $password
);

//fetch user from MongoDB Users Collection
$fetch = $userCollection->findOne($data);

if($fetch){
      $_SESSION['name'] = $fetch['Name'];
      $_SESSION['email'] = $fetch['Email'];
      
      $_SESSION['login_done'] = true;

      echo '<div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> Login successfully!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>';
  echo '<script>setTimeout(function() { 
      document.getElementById("alert").style.display = "none"; 
      window.location.href = "index.php"; 
  }, 1000);</script>';
} else {
  echo '<div id="alert" class="alert alert-danger alert-dismissible fade show" role="alert">
  incorrect information !
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
  <title>Login Form</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #23395d;
      color: #fff;
      height: 100vh;
    }

    .Login {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 350px;
      text-align: center;
    }

    .Login h2 {
      color: #23395d;
    }

    .form-a {
      margin-bottom: 20px;
    }

    .form-a label {
      display: block;
      text-align: left;
      margin-bottom: 3px;
    }

    .form-a input {
      width: 100%;
      padding: 8px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .form-a button {
      background-color: #23395d;
      color: #fff;
      padding: 7px 20px;
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
  <div class="Login" style=" margin-top: 20vh; ">
    <p style="color:#23395d; font-weight:bold; font-size: 20px;">Login</p>
    <form action="#" method="post">
      <div class="form-a">
        <label for="username" style="color:#23395d; font-weight:bold">Email:</label>
        <input type="text" id="username" name="email" required>
      </div>
      <div class="form-a">
        <label for="password" style="color:#23395d; font-weight:bold">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-a">
        <button type="submit" name="login">Login</button>
        <br>
        <p style="color: black;">Don't have account ? <a href="signup.php">Signup</a></p>
      </div>
    </form>
  </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
