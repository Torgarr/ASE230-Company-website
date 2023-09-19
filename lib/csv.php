<?php
function loadPageCSV1(){
	$file='products&services.csv';
	$fp =fopen($file, 'r');
	while($content=fgetcsv($fp)){
		echo '<pre>';
		echo '- ', $content[0], ': ', $content[1]. '<br >';
		echo '</pre>';
	}
	fclose($fp);
}

function loadPageCSV2(){
	$file='products&services.csv';
	$fp =fopen($file, 'r');
	while($content=fgetcsv($fp)){
		echo '<pre>';
		echo '- ', $content[0], ': '. '<br >';
		echo "\t",'Applications:'. '<br >';
		echo "\t\t",'- ', $content[2]. '<br >';
		echo "\t\t",'- ', $content[3]. '<br >';
		echo '</pre>';
	}
	fclose($fp);
}
