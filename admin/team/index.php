<?php
	$file = __DIR__ . '\\..\\..\\data\\members.json';
    $content = file_get_contents($file);

    $php_array = json_decode($content, true);


    $index = 1;
    foreach ($php_array['team'] as $person) {

        ?>
            <div class="col-lg-3 col-sm-6">
                    <div class="team-box mt-4 position-relative overflow-hidden rounded text-center shadow">
                        <div class="p-4"><?php
                        echo '<div class="p-4">';
                        echo '<h5 class="font-size-19 mb-1">' . '<a href="detail.php?variable=<?php echo urlencode($person['name']); ?>">' . $person['name'] . '</a>' . '</h5>';
                        echo '</div>';
                        ?></div>
                    </div>
                </div>
            <?php
        $index++;
    }
	echo '<a href="create.php"> <input type="submit"/></a>';
	
?>
