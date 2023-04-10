<?php
require_once 'masterPage.php';
require_once 'Squad_details.php';

// Create a new MasterPage instance
$masterPage = new masterPage("Squad Details");

// Set the dynamic content
$masterPage->setDynamic1(createSquadDetails());

// Render the page
$masterPage->renderPage();
