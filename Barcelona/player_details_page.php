<?php
require_once 'masterPage.php';
require_once 'player_details.php';

// Get the player ID from the URL parameter
$playerId = isset($_GET['id']) ? intval($_GET['id']) : 1;

// Set the dynamic content
$masterPage = new masterPage("");
$masterPage->setDynamic1(createPlayerDetails($playerId));
$masterPage->renderPage();

