<?php
require_once 'masterPage.php';
require_once 'User_authentication.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $message = loginUser($username, $password);
}

$masterPage = new masterPage('Login');
$content = <<<LOGIN
<div class="container">
    <h2>Login</h2>
    <form action="login_page.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        
        <input type="submit" value="Login">
    </form>
    <p>{$message}</p>
</div>
LOGIN;

$masterPage->setContent($content);
echo $masterPage->display();

