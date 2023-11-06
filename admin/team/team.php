<?php

class TeamMember {
    public $name;
    public $role;
    public $bio;

    public function __construct($name, $role, $bio) {
        $this->name = $name;
        $this->role = $role;
        $this->bio = $bio;
    }

    public function toArray() {
        return [
            'name' => $this->name,
            'role' => $this->role,
            'bio' => $this->bio,
        ];
    }
}

class TeamManager {
    private static $file = __DIR__ . '\\..\\..\\data\\members.json';

    public static function create(TeamMember $member) {
        $data = self::loadData();

        $data['team'][] = $member->toArray();

        self::saveData($data);

        return true;
    }

    public static function read() {
        $data = self::loadData();
        return $data['team'];
    }

    public static function update($id, TeamMember $member) {
        $data = self::loadData();

        if (isset($data['team'][$id])) {
            $data['team'][$id] = $member->toArray();
            self::saveData($data);
            return true;
        }

        return false;
    }

    public static function delete($id) {
        $data = self::loadData();

        if (isset($data['team'][$id])) {
            unset($data['team'][$id]);
            self::saveData($data);
            return true;
        }

        return false;
    }

    private static function loadData() {
        $content = file_get_contents(self::$file);
        $data = json_decode($content, true);

        if (!$data) {
            $data = ['team' => []];
        }

        return $data;
    }

    private static function saveData($data) {
        $updatedData = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents(self::$file, $updatedData);
    }
}







session_start();

function create() {
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $role = $_POST['role'];
        $bio = $_POST['bio'];

        $member = new TeamMember($name, $role, $bio);

        if (TeamManager::create($member)) {
            $_SESSION['message'] = 'Member successfully added';
            header("Location: {$_SERVER['PHP_SELF']}");
            exit();
        }
    }
}
// function create(){
//     session_start();
//     $file = __DIR__ . '\\..\\..\\data\\members.json';
// // Check if the form is submitted
//     if(isset($_POST['submit'])){
//     // Read existing JSON data
//         $data = file_get_contents($file);
//         $data_array = json_decode($data, true);

//     // Extract form data
//         $new_member = array(
//         'name' => $_POST['name'],
//         'role' => $_POST['role'],
//         'bio'  => $_POST['bio']
//         );
//         if(isset($json_data['team']) && is_array($json_data['team'])){
        
// 		// Append new member to the "team" array
//             $json_data['team'][] = $new_member;
//         } 
//     // Append new data
//         $data_array['team'][] = $new_member;

//     // Convert array to JSON and write to the file
//         $updated_data = json_encode($data_array, JSON_PRETTY_PRINT);
//         file_put_contents($file, $updated_data);

//         $_SESSION['message'] = 'Member successfully added';

//     // Redirect to avoid form resubmission on page refresh
//         header("Location: {$_SERVER['PHP_SELF']}");
//         exit();
//     }
// }


function index() {
    $members = TeamManager::read();
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Team Members</title>
    </head>
    <body>
        <h2>Team Members</h2>

        <?php
        // Display success or error message if available
        if (isset($_SESSION['message'])) {
            echo '<p>' . $_SESSION['message'] . '</p>';
            unset($_SESSION['message']); // Clear the message after displaying it
        }

        // Loop through team members and display them
        foreach ($members as $index => $member) {
            echo '<div class="col-lg-3 col-sm-6">';
            echo '<div class="team-box mt-4 position-relative overflow-hidden rounded text-center shadow">';
            echo '<div class="p-4">';
            echo '<h5 class="font-size-19 mb-1"><a href="detail.php?id=' . ($index + 1) . '">' . $member['name'] . '</a></h5>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            $_SESSION["name"] = $member['name'];
        }
        echo '<a href="create.php"><input type="submit" value="Create"/></a>';
        ?>

    </body>
    </html>
    <?php
}
/*
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
*/


function detail() {
    $id = $_GET['id'];
    $members = TeamManager::read();
    
    // Find the member with the specified ID
    $member = $members[$id - 1];

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Member Details</title>
    </head>
    <body>
        <h2>Member Details</h2>

        <?php
        // Display member details
        echo '<div class="col-lg-3 col-sm-6">';
        echo '<div class="team-box mt-4 position-relative overflow-hidden rounded text-center shadow">';
        echo '<div class="p-4">';
        echo '<h5 class="font-size-19 mb-1">' . $member['name'] . '</h5>';
        echo '<h5 class="font-size-19 mb-1">' . $member['role'] . '</h5>';
        echo '<h5 class="font-size-19 mb-1">' . $member['bio'] . '</h5>';
        echo '<h5 class="font-size-19 mb-1">' . '<a href="edit.php?id='.$id.'">' . 'Edit' . '</a>' . '</h5>';
		echo '<h5 class="font-size-19 mb-1">' . '<a href="delete.php?id='.$id.'">' . 'Delete' . '</a>' . '</h5>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        ?>
    </body>
    </html>
    <?php
}
/*
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
*/


function edit() {
    if (isset($_POST['submit'])) {
        $id = $_GET['id'] - 1;
        $name = $_POST['name'];
        $role = $_POST['role'];
        $bio = $_POST['bio'];

        $member = new TeamMember($name, $role, $bio);

        if (TeamManager::update($id, $member)) {
            $_SESSION['message'] = 'Member successfully edited';
            header("Location: {$_SERVER['PHP_SELF']}?id={$id}");
            exit();
        } else {
            $_SESSION['message'] = 'Invalid member ID';
        }
    }

    $id = $_GET['id'];
    $members = TeamManager::read();
    $member = $members[$id - 1];
}
/*
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
*/

function delete() {
    $id = isset($_GET['id']) ? (int)$_GET['id'] : null;

    if ($id !== null) {
        $members = TeamManager::read();
        if (isset($members[$id - 1])) {
            if (TeamManager::delete($id - 1)) {
                $_SESSION['message'] = 'Member successfully deleted';
            } else {
                $_SESSION['message'] = 'Failed to delete member';
            }
        } else {
            $_SESSION['message'] = 'Invalid member ID';
        }
    } else {
        $_SESSION['message'] = 'Invalid request';
    }

    header("Location: index.php");
    exit();
}
/*
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
*/
?>
