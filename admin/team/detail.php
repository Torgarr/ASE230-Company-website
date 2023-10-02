<?php
	echo urldecode($_GET['variable']);
	$recieved =  urldecode($_GET['variable']);
	$file = __DIR__ . '\\..\\..\\data\\members.json';
    $content = file_get_contents($file);
    $php_array = json_decode($content, true);
	foreach ($php_array['team'] as $person) {
		if($person['name'] == $recieved){
			?>
			
			<div class="col-lg-3 col-sm-6">
                    <div class="team-box mt-4 position-relative overflow-hidden rounded text-center shadow">
                        <div class="p-4"><?php
                        echo '<div class="p-4">';
                        echo '<h5 class="font-size-19 mb-1">' . $person['name'] . '</h5>';
						echo '<h5 class="font-size-19 mb-1">' . $person['role'] . '</h5>';
						echo '<h5 class="font-size-19 mb-1">' . $person['bio'] . '</h5>';
                        echo '</div>';
                        ?></div>
                    </div>
                </div>
				<?php
		}
	}


?>
