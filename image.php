<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>picture search</title>

  <link rel="website icon" type="png" href="icon.png">

  <link rel="stylesheet" href="index.css">

  <style>
    .errorMessage{
        color: black;
        height: 50px;
        width: 100%;
        font-size: medium;
        font-weight: bold;
        background-color: lightcoral;
        text-align: center;
    }
    .Message{
        color: black;
        height: 60px;
        width: 100%;
        font-size: medium;
        font-weight: bold;
        background-color: lightgreen;
        text-align: center;
    }
  </style>

</head>

<body>

<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';

$databaseConnection = new MongoDB\Client('mongodb+srv://kalpraj51:rBKe0Qr0ba9M1VyM@cluster0.zhl61c1.mongodb.net/?retryWrites=true&w=majority');

$myDatabase = $databaseConnection->picture_search;

$userCollection = $myDatabase->image; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(isset($_SESSION['login_done']))
    {
    $imageUrl = $_POST['imageUrl'];
    $email = $_SESSION['email'];

    // Check if the image is already in the database
    $data = array(
        "Email" => $email,
        "Url" => $imageUrl
    );
    // insert into database
    $insert = $userCollection->insertOne($data);
    if($insert)
    {
        ?>
        <div class="Message">Image added to your Like images!<button class="close" onclick="closethemessage()">X</button>
        
        <br><br>

        See your Like images : <a href="Likes.php" 
        style="padding: 5px 10px;
  font-size: 10px;
  font-weight: bold; 
  background-color: #373737;
  color: white;
  border-radius: 5px;
  text-decoration: none;">My Likes❤️</a>
        <div>
        
        <?php
    }
    else{
echo "<div class='errorMessage'>Somthing want wrong! <button class='close' onclick='closethemessage()'>X</button></div>";
    }
    }
    else
    {
        ?>
        <div class="errorMessage">TO like image Please log in first! <button class="close" onclick="closethemessage()">X</button></div>
        <?php
    }
}
?>
<script>
function closethemessage()
{
    var a = document.getElementsByClassName("errorMessage")[0];
    if (a) {
        a.style.display = 'none';
    }
    var b = document.getElementsByClassName("Message")[0];
    if (b) {
        a.style.display = 'none';
    }

}
</script>
</body>

</html>