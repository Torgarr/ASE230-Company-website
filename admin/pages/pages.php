<?php

$content = scandir('../../');
$contents;
foreach ($content as $item){
    if(str_contains($item, '.php')){
        $contents[] = $item;
    }
}


function getSize(){
    $i = 0;
    foreach ($GLOBALS['contents'] as $item){
        $i++;
    }
    return $i;
}


// Function to retrieve and list all pages
function getPageTitle($id)
{
    return ($GLOBALS['contents'][$id]);
}

function getPageContent($id)
{

    $source_code = file('../../'.$GLOBALS['contents'][$id]);
    foreach ($source_code as $line_number => $last_line) {
        echo nl2br(htmlspecialchars($last_line) . "\n");
    }

}

function createPage($file, $name){
    if (pathinfo($file['newpage']['full_path'],PATHINFO_EXTENSION) != "html" && pathinfo($file['newpage']['full_path'],PATHINFO_EXTENSION) != "php"){
        echo 'File must be a .html or .php';
    }
    elseif (!str_contains($name['file_name'], '.php') && !str_contains($name['file_name'], '.html')){
        echo 'File must be a .html or .php, make sure you include the file extension in the file name like test.php';
    }
    elseif (file_exists('../../'.$name['file_name'])){
        echo 'File already exists';
    }
    else{
        move_uploaded_file($file['newpage']['tmp_name'],'../../'.$name['file_name']);
        array_push($GLOBALS['contents'], $name['file_name']);
        
    }
}

function deletePage($name,$index){
    if (!file_exists('../../'.$name)){
        echo 'File Does not exists';
    }
    else{
        $path = dirname(__DIR__,2).'\\'.$name;
        unlink($path);
        unset($GLOBALS['contents'][$index]);
        $newcontent = [];
        foreach($GLOBALS['contents'] as $item){
            array_push($newcontent, $item);
        }
        $GLOBALS['contents'] = $newcontent;
        
        
    }
}


?>