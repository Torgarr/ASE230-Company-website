<?php

function create(){
    session_start();
    $file = __DIR__ . '\\..\\..\\data\\members.json';
// Check if the form is submitted
    if(isset($_POST['submit'])){
    // Read existing JSON data
        $data = file_get_contents($file);
        $data_array = json_decode($data, true);

    // Extract form data
        $new_member = array(
        'name' => $_POST['name'],
        'role' => $_POST['role'],
        'bio'  => $_POST['bio']
        );
        if(isset($json_data['team']) && is_array($json_data['team'])){
        
		// Append new member to the "team" array
            $json_data['team'][] = $new_member;
        } 
    // Append new data
        $data_array['team'][] = $new_member;

    // Convert array to JSON and write to the file
        $updated_data = json_encode($data_array, JSON_PRETTY_PRINT);
        file_put_contents($file, $updated_data);

        $_SESSION['message'] = 'Member successfully added';

    // Redirect to avoid form resubmission on page refresh
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    }
}


function index(){

    session_start();
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
                        echo '<h5 class="font-size-19 mb-1">' . '<a href="detail.php?id='.$index.'">' . $person['name'] . '</a>' . '</h5>';
                        echo '</div>';
                        ?></div>
                    </div>
                </div>
            <?php
			$_SESSION["name"] = $person['name'];
        $index++;
    }
	echo '<a href="create.php"> <input type="submit" value="Create"/></a>';
	
}


function detail(){
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

}


function edit(){
    session_start();
    $file = __DIR__ . '\\..\\..\\data\\members.json';
    
    // Check if the form is submitted
    if(isset($_POST['submit'])){
        // Read existing JSON data
        $data = file_get_contents($file);
        $data_array = json_decode($data, true);
    
        // Extract form data
        $edited_member = array(
            'name' => $_POST['name'],
            'role' => $_POST['role'],
            'bio'  => $_POST['bio']
        );
    
        // Check if the member with the specified ID exists in the "team" array
        $member_id = $_GET['id'] - 1;
        if(isset($data_array['team'][$member_id])){
            // Update the existing member's data
            $data_array['team'][$member_id] = $edited_member;
    
            // Convert array to JSON and write to the file
            $updated_data = json_encode($data_array, JSON_PRETTY_PRINT);
            file_put_contents($file, $updated_data);
    
            $_SESSION['message'] = 'Member successfully edited';
        } else {
            $_SESSION['message'] = 'Invalid member ID';
        }
    
        // Redirect to avoid form resubmission on page refresh
        header("Location: {$_SERVER['PHP_SELF']}?id={$member_id}");
        exit();
    }
    
    // Read existing JSON data to get current member values


}

function delete(){
    session_start();
    $file = __DIR__ . '\\..\\..\\data\\members.json';
    print_r($data_array['team'][$member_id]);
    // Check if the form is submitted
    
        // Read existing JSON data
        $data = file_get_contents($file);
        $data_array = json_decode($data, true);
    
        // Check if the member with the specified ID exists in the "team" array
        $member_id = $_GET['id'];
        if(isset($data_array['team'][$member_id-1])){
            // Delete the specified user's data
            unset($data_array['team'][$member_id - 1]);
    
    
            // Convert array to JSON and write to the file
            $updated_data = json_encode($data_array, JSON_PRETTY_PRINT);
            file_put_contents($file, $updated_data);
    
            $_SESSION['message'] = 'Member successfully edited';
        } else {
            $_SESSION['message'] = 'Invalid member ID';
        }
    
        // Redirect to avoid form resubmission on page refresh
        header("Location: {$_SERVER['PHP_SELF']}?id={$member_id}");
        exit();
    
    
    // Read existing JSON data to get current member values
    $data = file_get_contents($file);
    $data_array = json_decode($data, true);
    
    // Get the specified member's values
    $member_id = $_GET['id'];
    if(isset($data_array['team'][$member_id])){
        $current_member = $data_array['team'][$member_id];
    } else {
        $_SESSION['message'] = 'Invalid member ID';
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    }
}
?>
