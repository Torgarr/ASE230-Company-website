<?php
require_once('contacts.php');
$item = $_GET['id'];
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Request Detail</title>
</head>
<body>
    <h1><?php echo "Subject: ". getSubject($item); ?></h1>
    <h2><?php echo "ID: ". getID($item); ?></h2>
    <p><?php echo "Name: ". getName($item); ?></p>
    <p><?php echo "E-Mail: ". getEmail($item); ?></p>
    <p><?php echo  getComments($item); ?></p>

    <br><br>
    <a href="index.php">Back to Page List</a>
</body>
</html>