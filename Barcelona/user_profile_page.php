<?php
require_once 'masterPage.php';
require_once 'User_authentication.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login_page.php');
    exit;
}

$user = getUserById($_SESSION['user_id']);
$content = createProfileContent($user);

$masterPage = new masterPage("Your Profile");
$masterPage->setDynamic1($content);
$masterPage->renderPage();
