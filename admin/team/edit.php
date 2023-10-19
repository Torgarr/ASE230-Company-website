<?php
require_once('team.php');
$file = __DIR__ . '\\..\\..\\data\\members.json';

edit();

$data = file_get_contents($file);
$data_array = json_decode($data, true);

// Get the specified member's values
$member_id = $_GET['id'] - 1;
if(isset($data_array['team'][$member_id])){
    $current_member = $data_array['team'][$member_id];
} else {
    $_SESSION['message'] = 'Invalid member ID';
    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Member</title>
</head>
<body>
    <h2>Edit Member</h2>

    <?php
    // Display success or error message if available
    if(isset($_SESSION['message'])){
        echo '<p>' . $_SESSION['message'] . '</p>';
        unset($_SESSION['message']); // Clear the message after displaying it
    }
    ?>
	
    <form action="<?= $_SERVER['PHP_SELF'] ?>?id=<?= $_GET['id'] ?>" method="post">
        <label for="inputName">Name:</label>
        <input type="text" name="name" id="inputName" value="<?= $current_member['name'] ?>" required>

        <label for="inputRole">Role:</label>
        <input type="text" name="role" id="inputRole" value="<?= $current_member['role'] ?>" required>

        <label for="inputBio">Bio:</label>
        <textarea name="bio" id="inputBio" required><?= $current_member['bio'] ?></textarea>

        <input type="submit" name="submit" value="Edit Member">
    </form>
</body>
</html>
