<?php

require 'connect.php';

$newRole = json_decode(file_get_contents('php://input'), true);

$sql = "INSERT INTO `user_role`(`id`, `rolename`) VALUES (null, '{$newRole}')";

if (mysqli_query($con, $sql)) {
    http_response_code(201);
    echo json_encode(['status' => 'Role was created.']);
} else {
    http_response_code(401);
    echo json_encode(['status' => 'Role creation error.']);
}
