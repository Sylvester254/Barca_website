<?php
require_once 'masterPage.php';
require_once 'player_details.php';
require_once 'player_opinion.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: squad_details_page.php');
    exit;
}

$player = getPlayerById($_GET['id']);

if (!$player) {
    header('Location: squad_details_page.php');
    exit;
}

$masterPage = new masterPage("Player Details: {$player['name']}");

// Check if the user is logged in
$userId = null;
$username = null;
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    $userId = $_SESSION['user_id'];
    $username = $_SESSION['username'];
}

$masterPage->setDynamic1(createPlayerDetails($player, $userId, $username));
$masterPage->renderPage();
