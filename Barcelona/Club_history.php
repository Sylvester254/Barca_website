<?php
require_once 'MasterPage.php';
require_once 'Club_details.php';

function createClubHistory() {
    $jsonData = file_get_contents("data/club_history.json");
    $clubHistory = json_decode($jsonData, true);

    $html = <<<CLUB_HISTORY
    <div class="container">
        <h2>{$clubHistory['title']}</h2>
        <p>{$clubHistory['content']}</p>
    </div>
CLUB_HISTORY;

    return $html;
}

$masterPage = new MasterPage("Club History");
$masterPage->setDynamic1(createClubHistory());
$masterPage->renderPage();
