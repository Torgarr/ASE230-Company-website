<?php

$content = file_get_contents('../../data/contact.json');
$content = json_decode($content,true);



function getSize(){
    $i = 0;
    if (empty($GLOBALS['content'])){
        return 0;
    }
    else{
        foreach ($GLOBALS['content'] as $item){
            $i++;
        }
    return $i;
    }
}

function getID($index){
    return ($GLOBALS['content'][$index]['id']);
}

function getSubject($index){
    return ($GLOBALS['content'][$index]['subject']);
}

function getName($index){
    return ($GLOBALS['content'][$index]['name']);
}

function getEmail($index){
    return ($GLOBALS['content'][$index]['email']);
}

function getComments($index){
    return ($GLOBALS['content'][$index]['comments']);
}
?>

