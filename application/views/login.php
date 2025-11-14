<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>
<body>
    <h2>Login</h2>
    <?= $this->session->flashdata('msg') ?>
    <form action="<?= site_url('login/auth') ?>" method="post">
        <label>Username</label><br>
        <input type="text" name="username" placeholder="Username"><br>
        <label>Password</label><br>
        <input type="password" name="password" placeholder="Password"><br>
        <button type="submit">Sign In</button>
    </form>
</body>
</html>