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
include 'partials/header.php';
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>View User: <b><?php echo $user['name'] ?></b>
            </h3>
        </div>
<div class="card-body">
    <a href="update.php?id=<?php echo $user['id']; ?>" class="btn btn-primary btn-sm">Update</a>
    <form action="delete.php" method="post" style="display:inline;">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
    </form>
</div>
    <table class="table">
        <tr>
            <th>Name:</th>
            <td><?php echo $user['name'] ?></td>
        </tr>
        <tr>
            <th>Username:</th>
            <td><?php echo $user['username'] ?></td>
        </tr>
        <tr>
            <th>Email:</th>
            <td><?php echo $user['email'] ?></td>
        </tr>
        <tr>
            <th>Phone:</th>
            <td><?php echo $user['phone'] ?></td>
        </tr>
        <tr>
            <th>Website:</th>
            <td><a target="_blank" href="http://<?php echo $user['website'] ?>">
                    <?php echo $user['website'] ?></a></td>
        </tr>
    </table>
    </div>
</div>
</div>

