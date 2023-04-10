<?php
require_once 'masterPage.php';
require_once 'Club_details.php';

function createClubManagement() {
    $jsonData = file_get_contents("data/club_management.json");
    $clubManagement = json_decode($jsonData, true);

    $html = <<<CLUB_MANAGEMENT
    <div class="container">
        <h2>{$clubManagement['title']}</h2>
        <p>{$clubManagement['content']}</p>
    </div>
CLUB_MANAGEMENT;

    return $html;
}

$masterPage = new masterPage("Club Management");
$masterPage->setDynamic1(createClubManagement());
$masterPage->renderPage();
