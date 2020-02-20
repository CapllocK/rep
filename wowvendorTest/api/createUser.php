<?php

require 'connect.php';

$newUser = json_decode(file_get_contents('php://input'), true);

$name = $newUser['userName'];
$roleId = $newUser['userRole'];

$sql = "INSERT INTO `user`(`id`, `username`, `role_id`) VALUES (null, '{$name}', '{$roleId}')";

if (mysqli_query($con, $sql)) {
    http_response_code(201);
    echo json_encode(['status' => 'User was created.']);
} else {
    http_response_code(401);
    echo json_encode(['status' => 'User creation error.']);
}
