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
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    var_dump($_FILES);
     $user = updateUser($_POST,$user_id);
     if(isset($_FILES['picture'])){
         if(!is_dir(__DIR__ . "/users/images")){
             mkdir(__DIR__ . "/users/images");
         }
         //get the files extensions from the filename
         $filename = $_FILES['picture']['name'];
         //search for the dot in the filename
         $dotPosition = strpos($filename, '.');
        //Take the substring from the substring till the end of string
         $extension = substr($filename, $dotPosition +1);
         move_uploaded_file($_FILES['picture']['tmp_name'], __DIR__ . "/users/images/$user_id.$extension");
         $user['extension'] = $extension;
         updateUser($user,$user_id);
     }
     header('Location:index.php');
}
include 'partials/header.php';
?>
<div class="container mt-5">
    <h2>Update User: <?php echo $user['name']?> </h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="ime" class="form-label" >Name</label>
            <input type="text"value="<?php echo $user['name'] ?>" class="form-control" id="ime" name="name" required>
        </div>
        <div class="mb-3">
            <label for="prezime" class="form-label">Username</label>
            <input type="text" value="<?php echo $user['username'] ?>" class="form-control" id="prezime" name="username" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email"value="<?php echo $user['email'] ?>" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="telefon" class="form-label">Phone</label>
            <input type="tel" value="<?php echo $user['phone'] ?>" class="form-control" id="telefon" name="phone">
        </div>
        <div class="mb-3">
            <label for="website" class="form-label">Website</label>
            <input name="website" value="<?php echo $user['website'] ?>" class="form-control" id="website">
        </div>
        <div class="mb-3">
            <label for="picture" class="form-label">Dodaj sliku</label><br>
            <input type="file"  id="picture" name="picture" accept="image/*" >
        </div>
        <button type="submit" class="btn btn-primary">Pošalji</button>
    </form>
</div>
