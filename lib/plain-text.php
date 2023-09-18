<?php
function loadPagePlain($page){
    $path=__DIR__.'\\..\\data\\'.$page.'.txt';
    $content = file_get_contents($path);
    echo $content;
}
?>