<?php
function loadPageCSV1()
{
	$file = __DIR__ . '\\..\\data\\products&services.csv';
	$fp = fopen($file, 'r');
	while ($content = fgetcsv($fp)) {
?>

		<div class="col-lg-3">
			<div class="service-box text-center px-1 py-5 position-relative mb-4">
				<div class="service-box-content p-4">
					<div class="icon-mono service-icon avatar-md mx-auto mb-4">
						<i class="" data-feather="box"></i>
					</div>
					<h4 class="mb-3 font-size-22"><?php echo $content[0] ?></h4>
					<p class="mb-5 text-muted subtitle w-75 mx-auto"><?php echo $content[1] ?></p>
				</div>
			</div>
		</div>
<?php
	}
	fclose($fp);
}

function loadPageCSV2()
{
	$file = __DIR__ . '\\..\\data\\products&services.csv';
	$fp = fopen($file, 'r');
	$index = 0;
	while ($content = fgetcsv($fp)) {
		if ($index  % 2 == 0){
			?>
			<div class="row align-items-center mb-5">
                <div class="col-md-5 order-2 order-md-1 mt-md-0 mt-5">
                    <h2 class="mb-4"><?php echo $content[0] ?></h2>
                    <p class="text-muted mb-5"><?php echo $content[2] . '<br><br>' . $content[3] ?></p>
                    <a href="javascript: void(0);" class="btn btn-primary">Find out more <i class="icon-xs ms-2" data-feather="arrow-right"></i></a>
                </div>
                <!-- end col -->
                <div class="col-md-6 ms-md-auto order-1 order-md-2">
                    <div class="position-relative">
                        <div class="ms-5 features-img">
                            <img src="images/features-1.jpg" alt="" class="img-fluid d-block mx-auto rounded shadow" />
                        </div>
                        <img src="images/dot-img.png" alt="" class="dot-img-left" />
                    </div>
                </div>
                <!-- end col -->
            </div>
			<?php
		}
		else{
			?>
			<div class="row align-items-center section pb-15">
                <div class="col-md-6">
                    <div class="position-relative mb-md-0 mb-5">
                        <div class="me-5 features-img">
                            <img src="images/features-2.jpg" alt="" class="img-fluid d-block mx-auto rounded shadow" />
                        </div>
                        <img src="images/dot-img.png" alt="" class="dot-img-right" />
                    </div>
                </div>
                <!-- end col -->
                <div class="col-md-5 ms-md-auto">
                    <h2 class="mb-4"><?php echo $content[0] ?></h2>
                    <p class="text-muted mb-5"><?php echo $content[2] . '<br><br>' . $content[3] ?></p>
                    <a href="javascript: void(0);" class="btn btn-primary">Find out more <i class="icon-xs ms-2" data-feather="arrow-right"></i></a>
                </div>
                <!-- end col -->
            </div>
			<?php
		}
		// echo '<pre>';
		// echo '- ', $content[0], ': ' . '<br >';
		// echo "\t", 'Applications:' . '<br >';
		// echo "\t\t", '- ', $content[2] . '<br >';
		// echo "\t\t", '- ', $content[3] . '<br >';
		// echo '</pre>';
		$index++;
	}
	fclose($fp);
}
