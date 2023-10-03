<?php
session_start();
$file = __DIR__ . '\\..\\..\\data\\members.json';
// Check if the form is submitted
if(isset($_POST['submit'])){
    // Read existing JSON data
    $data = file_get_contents($file);
    $data_array = json_decode($data, true);

    // Extract form data
    $new_member = array(
        'name' => $_POST['name'],
        'role' => $_POST['role'],
        'bio'  => $_POST['bio']
    );
    if(isset($json_data['team']) && is_array($json_data['team'])){
        
		// Append new member to the "team" array
        $json_data['team'][] = $new_member;
    } 
    // Append new data
    $data_array['team'][] = $new_member;

    // Convert array to JSON and write to the file
    $updated_data = json_encode($data_array, JSON_PRETTY_PRINT);
    file_put_contents($file, $updated_data);

    $_SESSION['message'] = 'Member successfully added';

    // Redirect to avoid form resubmission on page refresh
    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}

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
