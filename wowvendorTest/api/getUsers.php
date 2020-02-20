<?php

require 'connect.php';

$user = [];
$sql = "SELECT user.username, user_role.rolename FROM `user`, `user_role` WHERE user.role_id = user_role.id";

if ($result = mysqli_query($con, $sql)) {
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $user[$i]['name'] = $row['username'];
        $user[$i]['role'] = $row['rolename'];
        $i++;
    }
    echo json_encode($user);
} else {
    http_response_code(404);
}
