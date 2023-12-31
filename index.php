<?php
session_start();
if (isset($_GET['logout']))
{

unset($_SESSION['email']);
$_SESSION['login_done'] = false;
session_destroy();

header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>picture search</title>

  <link rel="website icon" type="png" href="icon.png">

  <link rel="stylesheet" href="index.css">

</head>

<body>
  <div id="loader"><img src="loader1.gif" style="
width: 100%;">
  </div>
  <nav class="nav">
    
    <a href="index.html" class="nav-txt"><img src="icon.png" width="20" height="20" style="margin-top:10px; margin-left: 7px;">Picture Search</a>
    <a href="filter.html" class="nav-txt">Filter</a>
    <?php

    if (isset($_SESSION['login_done'])) {
    ?>
      <a href="?logout" class="nav-txt" name="logout">Logout</a>
    <?php
    }
    else{
    ?>
    <a href="login.php" class="nav-txt">Login</a>
    <a href="signup.php" class="nav-txt">Signup</a>
    <?php
    }
    ?>
    <hr style="margin-top: 4px;">
    <a href="Likes.php" class="like">My Likes❤️</a>
  </nav>
  <hr>
  
  <video autoplay muted loop id="myVideo">
    <source src="bg.mp4" type="video/mp4">
  </video>

  <header class="section">
    <div class="name">
      <h1 class="txt">picture search</h1>
      <div class="container">
        <p class="sub-t1">Beautiful, free images and photos that you can download and use for any project.</p>
        <p class="sub-t2">Better than any royalty free or stock photos.</p>
      </div>
      <div class="a"> </div>
      <div style="border-style: ridge; margin-left: 9px; margin-right: 9px;">
        <form action="search.html">
          <input type="text" autocomplete="off" name="search" class="serchbox" placeholder="search...">
          <button class="serchbutt" type="submit">Search</button>
        </form>
      </div>
    </div>
  </header>
  <button class="filterB" onclick="window.location.href = 'filter.html'">Add Filter</button>
  <!-- pop up -->

  <div class="pop hide">
    <button class="close">✘</button>
    <a href="#" class="download">Download Image</a>
    <button class="like-button">Like</button>

    
    <img src="" class="popimage">
    <img src="next.png" class="nimage">
    <img src="previous.png" class="pimage">
  </div>

  <!-- pop up  -->

  <section class="gallery">
  </section>

  <nav style="background-color: #333333;">
    <p style="font-size:4px"> ‎ </p>
    <p style="color: white; font-size: medium; cursor: pointer; text-align: center; margin-bottom:0px"
      onclick="topFunction()">Go To Top</p>
    <p style="font-size:4px"> ‎ </p>
  </nav>
  <nav style="background-color: #262626;">
    <p style="font-size:3px"> ‎ </p>
    <br>
  </nav>
  <div
    style="column-count: 4; color:whitesmoke;  text-align:center; font-size:9px; background-color: #262626; margin-top:0px">
    <p>
      Get to Know me<br>
      About me<br>
      student<br>
      B.tech in <br>
      IT Engineering<br>

    </p>
    <p>
      Connect with me<br>
      linkedin<br>
      Github<br>
      8780390233<br></p>
    <p>
      Picture Search<br>
      any images<br>
      serch with<br>
      Unsplash<br>
      unsplash.com api<br></p>
    <p>
      HelpTerms<br>
      about<br>
      copyrights<br>
      Privacy Policy<br></p>
  </div>

  <nav style="background-color: #212121; display: flex; justify-content: center; align-items: center;margin-top:0px">
    <div style="overflow: hidden;">
      <img src="icon.png" width="40px" height="40px" style="margin: 20px; border-radius: 20px;">
    </div>
    <p style="color:whitesmoke">kalpraj51@gmail.com</p>
  </nav>
  <nav style="background-color: #212121; display: flex; justify-content: center; align-items: center;margin-top:0px">
    <br>
  </nav>

  <script src="index.js"></script>
</body>

</html>