<?php
require_once('pages.php');

if(count($_POST)>0){
    $count = getSize();
    createPage($_FILES, $_POST);
    $item = getSize() - 1;
    header('location: edit.php?id='.$item);
}


?>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
<label>File Name (include extension)</label><br />
<input name="file_name" type="text" /><br />
<input name="newpage" type="file" /><br />
<button type="submit">Submit Form</button>
</form>

<a href="index.php">Back to Page List</a>