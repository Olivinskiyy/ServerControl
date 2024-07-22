<?php
$servername = "149.202.88.119";
$username = "gs260795";
$password = "HO0LP4SYWhTO";
$dbname = "gs260795";

header('Content-Type: application/json');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(array("status" => "error", "message" => "Connection failed: " . $conn->connect_error)));
}

if (isset($_POST['nickname'])) {
    $nickname = $conn->real_escape_string($_POST['nickname']);
    
    $sql = "UPDATE accounts SET confirm_email = 1 WHERE nickname = '$nickname'";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(array("status" => "success", "message" => "Record updated successfully"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Error updating record: " . $conn->error));
    }
} else {
    echo json_encode(array("status" => "error", "message" => "No nickname provided"));
}

$conn->close();
?>
