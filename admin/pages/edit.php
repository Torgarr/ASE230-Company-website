<?php
require_once('pages.php');
$item = $_GET['id'];
print_r($item);
if(count($_POST)>0){
    
    deletePage(getPageTitle($item),$item);
    
    createPage($_FILES, $_POST);
    $item = getSize();
}

?>

<form action="<?= $_SERVER['PHP_SELF'] ?>?id=<?= $_GET['id'] ?>" method="POST" enctype="multipart/form-data">
<label>File Name (include extension)</label><br />
<input name="file_name" type="text" value="<?=getPageTitle($item) ?>"/><br />
<input name="newpage" type="file" /><br />
<button type="submit">Submit Form</button>
</form>