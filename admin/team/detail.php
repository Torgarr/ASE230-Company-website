<?php
	session_start();
	$file = __DIR__ . '\\..\\..\\data\\members.json';
    	$content = file_get_contents($file);
    	$php_array = json_decode($content, true);
	$index = 1;
	$item = $_GET['id'];
	
	foreach ($php_array['team'] as $person) {
		if($index == $item){
			?>
			
			<div class="col-lg-3 col-sm-6">
                    <div class="team-box mt-4 position-relative overflow-hidden rounded text-center shadow">
                        <div class="p-4"><?php
                        echo '<div class="p-4">';
                        echo '<h5 class="font-size-19 mb-1">' . $person['name'] . '</h5>';
						echo '<h5 class="font-size-19 mb-1">' . $person['role'] . '</h5>';
						echo '<h5 class="font-size-19 mb-1">' . $person['bio'] . '</h5>';
						echo '<h5 class="font-size-19 mb-1">' . '<a href="edit.php?id='.$index.'">' . 'Edit' . '</a>' . '</h5>';
						echo '<h5 class="font-size-19 mb-1">' . '<a href="delete.php?id='.$index.'">' . 'Delete' . '</a>' . '</h5>';
                        echo '</div>';
                        ?></div>
                    </div>
                </div>
				<?php
		}
		$index ++;
	}


?>
