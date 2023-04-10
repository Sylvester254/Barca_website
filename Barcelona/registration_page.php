<?php
require_once 'masterPage.php';
require_once 'user_functions.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $country = $_POST['country'];
    $favorite_player = $_POST['favorite_player'];

    $message = registerUser($username, $email, $password, $first_name, $last_name, $country, $favorite_player);
}

$masterPage = new masterPage('Registration');
$content = <<<REGISTRATION
<div class="container">
    <h2>Registration</h2>
    <form action="registration_page.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name" required>
        
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name" required>
        
        <label for="country">Country:</label>
        <input type="text" name="country" id="country" required>
        
        <label for="favorite_player">Favorite Player:</label>
        <input type="text" name="favorite_player" id="favorite_player" required>
        
        <input type="submit" value="Register">
    </form>
    <p>{$message}</p>
</div>
REGISTRATION;

$masterPage->setContent($content);
echo $masterPage->display();

