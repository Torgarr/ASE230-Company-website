<?php
function displayMembers(){
    $file = __DIR__ . '\\..\\data\\members.json';
    $content = file_get_contents($file);

    $php_array = json_decode($content, true);


    $index = 1;
    foreach ($php_array['team'] as $person) {

        ?>
            <div class="col-lg-3 col-sm-6">
                    <div class="team-box mt-4 position-relative overflow-hidden rounded text-center shadow">
                        <div class="position-relative overflow-hidden">
                            <img src="images/team/<?php echo($index % 4 + 1) ?>.jpg" alt="" class="img-fluid d-block mx-auto" />
                            <ul class="list-inline p-3 mb-0 team-social-item">
                                <li class="list-inline-item mx-3">
                                    <a href="javascript: void(0);" class="team-social-icon h-primary"><i class="icon-sm" data-feather="facebook"></i></a>
                                </li>
                                <li class="list-inline-item mx-3">
                                    <a href="javascript: void(0);" class="team-social-icon h-info"><i class="icon-sm" data-feather="twitter"></i></a>
                                </li>
                                <li class="list-inline-item mx-3">
                                    <a href="javascript: void(0);" class="team-social-icon h-danger"><i class="icon-sm" data-feather="instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="p-4"><?php
                        echo '<div class="p-4">';
                        echo '<h5 class="font-size-19 mb-1">' . $person['name'] . '</h5>';
                        echo '<p class="text-muted text-uppercase font-size-14 mb-0">' . $person['role'] . '</p>';
                        echo '<p>' . $person['bio'] . '</p>';
                        echo '</div>';
                        ?></div>
                    </div>
                </div>
            <?php
        $index++;
    }
}
?>