<?php
require_once('team.php');

create();

// Display the form
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Member</title>
</head>
<body>
    <h2>Add New Member</h2>

    <?php
    // Display success or error message if available
    if(isset($_SESSION['message'])){
        echo '<p>' . $_SESSION['message'] . '</p>';
        unset($_SESSION['message']); // Clear the message after displaying it
    }
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="inputName">Name:</label>
        <input type="text" name="name" id="inputName" required>

        <label for="inputRole">Role:</label>
        <input type="text" name="role" id="inputRole" required>

        <label for="inputBio">Bio:</label>
        <textarea name="bio" id="inputBio" required></textarea>

        <input type="submit" name="submit" value="Add Member">
    </form>
</body>
</html>
