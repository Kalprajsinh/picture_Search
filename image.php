<?php

require_once __DIR__ . '/vendor/autoload.php';

$databaseConnection = new MongoDB\Client('mongodb+srv://kalpraj51:rBKe0Qr0ba9M1VyM@cluster0.zhl61c1.mongodb.net/?retryWrites=true&w=majority');

$myDatabase = $databaseConnection->picture_search;

$userCollection = $myDatabase->images; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $imageUrl = $_POST['imageUrl'];
    echo $imageUrl;

}
?>

