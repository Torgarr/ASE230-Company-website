<?php

    $file = __DIR__ . '\\..\\data\\members.json';
    $content = file_get_contents($file);

    $php_array = json_decode($content, true);

    foreach($php_array as $person) {
        echo $person['name'].'<br />'. $person['role'].'<br />'.
            $person['bio'];
    }
?>