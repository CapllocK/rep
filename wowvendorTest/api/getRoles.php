<?php

require 'connect.php';

$roles = [];
$sql = "SELECT * FROM `user_role`";

if ($result = mysqli_query($con, $sql)) {
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $roles[$i]['id'] = $row['id'];
        $roles[$i]['rolename'] = $row['rolename'];
        $i++;
    }
    echo json_encode($roles);
} else {
    http_response_code(404);
}
