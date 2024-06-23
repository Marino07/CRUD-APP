<?php
include __DIR__ . '/users/users.php';
if(!isset($_POST['id'])){
include 'partials/alert.php';
exit;
}
$user_id = $_POST['id'];
deleteUser($user_id);
header("Location: index.php");