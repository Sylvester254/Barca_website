<?php
require_once 'masterPage.php';
require_once 'User_authentication.php';

function createLoginForm($message) {
    $html = <<<LOGIN_FORM
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
        <p>Don't have an account? <a href="registration_page.php">Register here</a>.</p>
    </div>
LOGIN_FORM;
    return $html;
}


$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $message = loginUser($username, $password);
}

$masterPage = new masterPage("Login");
$masterPage->setDynamic1(createLoginForm($message));
$masterPage->renderPage();
