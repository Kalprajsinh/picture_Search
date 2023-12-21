<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="search.css">
    <style>
        .image-container {
    width: 23%; 
    margin: 10px;
    position: relative;
    float: left;
}

.iimag {
    max-width: 100%;
    height: auto;
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px;
    display: block;
}

.remove-button {
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    background-color: #ff0000; /* Red color */
    color: #ffffff; /* White text */
    border: none;
    border-radius: 4px;
    padding: 5px 10px;
    cursor: pointer;
}

.remove-button:hover {
    background-color: #cc0000; /* Darker red on hover */
}

@media only screen and (max-width: 600px) {
    .image-container {
        width: 100%;
    }
}

@media only screen and (max-width: 900px) {
    .image-container {
        width: 30%;
    }
}

    </style>
</head>
<body>
<header class="section">
        <nav class="navbar">
        <form action="search.html">
            <input type="text" autocomplete="off" name="search" class="serchbox" placeholder="search images">
            <button class="serchbutt" type="submit">Search</button> 
       </form> 
       <form action="index.php">
        <button class="home" type="submit">Home</button> 
       </form> 
    </nav>
    </header>
<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';

$databaseConnection = new MongoDB\Client('mongodb+srv://kalpraj51:rBKe0Qr0ba9M1VyM@cluster0.zhl61c1.mongodb.net/?retryWrites=true&w=majority');

$myDatabase = $databaseConnection->picture_search;

$userCollection = $myDatabase->image; 

if(isset($_SESSION['login_done']))
{

$query = ['Email' => $_SESSION['email']];

$cursor = $userCollection->find($query);

if (isset($_POST['removeimg'])) {
    $imageId = $_POST['remove'];

    $filter = ['Url' => $imageId];

    $result = $userCollection->deleteOne($filter);

    if ($result->getDeletedCount() > 0) {
        echo "Image removed successfully!";
    } else {
        echo "Failed to remove image.";
    }
    header("Refresh:0");
}

foreach ($cursor as $document) {
?>
<div class="image-container">
        <img class="iimag" src="<?php echo $document['Url'] ?>">
        <form action="" method="post">
            <input type="hidden" name="remove" value="<?php echo $document['Url'] ?>">
            <button type="submit" class="remove-button" name="removeimg">Remove Image</button>
        </form>
</div>
<?php
}
}
else
{
    echo "\n\tnot login";
}
?>

</body>
</html>