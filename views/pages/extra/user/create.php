<?php

$message = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = trim($_POST['name']);
    $full_name = trim($_POST['full_name']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);
    $mobile = trim($_POST['mobile']);
    $role_id = intval($_POST['role_id']);
    $inactive = isset($_POST['inactive']) ? 1 : 0;
    $photo_name = "";

    // Photo upload
    if (!empty($_FILES['photo']['name'])) {
        $photo_name = time() . "_" . basename($_FILES['photo']['name']);
        $target_dir = "img/";
        $target_file = $target_dir . $photo_name;

        if (!move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
            $message = "Failed to upload photo.";
        }
    }

    // Only save if no previous error
    if ($message == "") {
        $user = new User();
        $user->set(
            null,
            $name,
            $full_name,
            password_hash($password, PASSWORD_DEFAULT), // hashed password
            $email,
            $mobile,
            $photo_name,
            $role_id,
            $inactive
        );

        $id = $user->save();
        if ($id) {
            $message = "User created successfully! ID: $id";
        } else {
            $message = "Failed to create user.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create User</title>
    <link rel="stylesheet" href="<?= $base_url ?>/assets/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Create New User</h2>
    <?php if($message): ?>
        <div class="alert alert-info"><?= $message ?></div>
    <?php endif; ?>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="full_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Mobile</label>
            <input type="text" name="mobile" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Photo</label>
            <input type="file" name="photo" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Role ID</label>
            <input type="number" name="role_id" class="form-control" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="inactive" class="form-check-input" id="inactive">
            <label class="form-check-label" for="inactive">Inactive</label>
        </div>
        <button type="submit" class="btn btn-success">Create User</button>
        <a href="<?= $base_url ?>/user/index.php" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>
