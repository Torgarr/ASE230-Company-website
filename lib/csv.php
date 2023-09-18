<?php
function loadPageCSV(){
	$file='products&services.csv';
	$fp =fopen($file, 'r');
	while($content=fgetcsv($fp)){
		echo '- ', $content[0], ': ', $content[1]. '<br >';
		echo 'Applications:'. '<br >';
		echo '- ', $content[2]. '<br >';
		echo '- ', $content[3]. '<br >';
	}
	fclose($fp);
}
