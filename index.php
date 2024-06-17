<?php
require 'users/users.php';
$users = getUsers();
include 'partials/header.php';
?>

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
                    <a href="view.php?id=<?php echo $user['id']?>" class="btn-sm btn-primary">View</a>
                    <a href="update.php?id=<?php echo $user['id']?>" class="btn-sm btn-primary">Update</a>
                    <a href="delete.php?id=<?php echo $user['id']?>" class="btn-sm btn-danger">Delete</a>

                </td>


            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>


