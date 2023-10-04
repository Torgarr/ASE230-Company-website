<?php
session_start();
$file = __DIR__ . '\\..\\..\\data\\awards.txt';

// Check if the form is submitted
if(isset($_POST['submit'])){
    // Extract form data
    $year = $_POST['year'];
    $award = $_POST['award'];

    // Prepare the new line
    $new_line = "\n" . $year . ": " . $award;

    // Append the new line to the file
    file_put_contents($file, $new_line, FILE_APPEND | LOCK_EX);

    $_SESSION['message'] = 'Award successfully added';

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
    <title>Add Award</title>
</head>
<body>
    <h2>Add New Award</h2>

    <?php
    // Display success or error message if available
    if(isset($_SESSION['message'])){
        echo '<p>' . $_SESSION['message'] . '</p>';
        unset($_SESSION['message']); // Clear the message after displaying it
    }
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="inputYear">Year:</label>
        <input type="text" name="year" id="inputYear" required>

        <label for="inputAward">Award:</label>
        <input type="text" name="award" id="inputAward" required>

        <input type="submit" name="submit" value="Add Award">
    </form>
</body>
</html>
