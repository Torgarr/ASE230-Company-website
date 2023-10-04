<?php
	session_start();
	$file = __DIR__ . '\\..\\..\\data\\awards.txt';
    $content = file_get_contents($file);

    $awards_array = explode('<br>', $content);

    $index = 1;
    foreach ($awards_array as $award) {
        // Extract year and description
        preg_match('/(\d{4}): (.*)/', $award, $matches);

        if (count($matches) == 3) {
            $year = $matches[1];
            $description = $matches[2];
			$items = explode(' ', $description, 3);

            ?>
            <div class="col-lg-3 col-sm-6">
                <div class="team-box mt-4 position-relative overflow-hidden rounded text-center shadow">
                    <div class="p-4">
                        <h5 class="font-size-19 mb-1">
                            <a href="detail.php?id=<?php echo $index; ?>">
                                <?php echo $year . ': ' . $items[0] . ' '. $items[1] . '...'; ?>
                            </a>
                        </h5>
                    </div>
                </div>
            </div>
            <?php

			$_SESSION["name"] = $description;  // You might want to adjust this based on your needs
            $index++;
        }
    }
    echo '<a href="create.php"> <input type="submit"/></a>';
?>
