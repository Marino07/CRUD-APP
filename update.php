<?php
include __DIR__ . '/users/users.php';
if(!isset($_GET['id'])){
    include 'partials/alert.php';
    exit;
}
$user_id = $_GET['id'];
$user = getUserbyID($user_id);
if(!$user){
    include 'partials/alert.php';
    exit;
}
$errors = [
    'name' => "",
    'username' => "",
    'email' => "",
    'phone' => "",
    'website' => "",
];
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = array_merge($user,$_POST);
    $isValid = validateUser($user, $errors);
    if ($isValid) {
        $user = updateUser($_POST, $user_id);
        uploadImage($_FILES['picture'], $user);
        header("Location: index.php");

    }

}
include 'partials/header.php';
include '_form.php';?>


