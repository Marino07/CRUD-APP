<?php

function getUsers(){
 return json_decode(file_get_contents(__DIR__  . "/users.json"),true);
}
function getUserbyID($id){
$users = getUsers();
foreach($users as $user){
    if($user['id'] == $id){
        return $user;
    }
}
return null;
}
function createUser($data){

}
function updateUser($data, $id) {
    $updateUser = [];
    $users = getUsers();
    foreach ($users as &$user) {
        if ($user['id'] == $id) {
            $user = $updateUser = array_merge($user, $data);
        }

    }
    file_put_contents(__DIR__  . "/users.json", json_encode($users, JSON_PRETTY_PRINT));
    return $updateUser;
}

function deleteUser($id){

}