<?php
require 'users/users.php';
$users = getUsers();
include 'partials/header.php';
?>
<div class="container">
    <a href="create.php" class="btn btn-primary">Create New User</a>
</div
<body>
<div class="container">
    <table>
        <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Website</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td>
                    <?php if (isset($user['extension'])): ?>
                        <img style="width: 60px" src="<?php echo "users/images/${user['id']}.${user['extension']}" ?>" alt="">
                    <?php endif; ?>
                </td>
                <td><?php echo $user['name'] ?></td>
                <td><?php echo $user['username'] ?></td>
                <td><?php echo $user['email'] ?></td>
                <td><?php echo $user['phone'] ?></td>
                <td><a target="_blank" href="http://<?php echo $user['website'] ?>">
                        <?php echo $user['website'] ?></a>
                </td>
                <td>
                    <a href="view.php?id=<?php echo $user['id']; ?>" class="btn btn-primary btn-sm">View</a>
                    <a href="update.php?id=<?php echo $user['id']; ?>" class="btn btn-primary btn-sm">Update</a>
                    <form action="delete.php" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>

                </td>


            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>



