<?php
require_once('contacts.php');
$item = $_GET['id'];
$contact = ContactManager::getContactById($item);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Request Detail</title>
</head>
<body>
    
    <h1><?php echo "Subject: " . $contact->getSubject(); ?></h1>
    <h2><?php echo "ID: " . $contact->getId(); ?></h2>
    <p><?php echo "Name: " . $contact->getName(); ?></p>
    <p><?php echo "E-Mail: " . $contact->getEmail(); ?></p>
    <p><?php echo "Comments: " . $contact->getComments(); ?></p>

    <br><br>
    <a href="index.php">Back to Page List</a>
</body>
</html>
