<?php
require_once 'MasterPage.php';
require_once 'Club_details.php';

function createClubHistory() {
    $jsonData = file_get_contents("data/club_history.json");
    $clubHistory = json_decode($jsonData, true);

    $html = <<<CLUB_HISTORY
    <div class="container club-history-container">
        <h2>{$clubHistory['article_title']}</h2>
CLUB_HISTORY;
    
    foreach ($clubHistory['article_sections'] as $section) {
        $html .= <<<SECTION
        <div class="section">
            <h3 class="section-title">{$section['section_title']}</h3>
            <p class="section-content">{$section['section_content']}</p>
        </div>
SECTION;
    }
    
    $html .= '</div>';
    
    
    return $html;
}

$masterPage = new MasterPage("Club History");
$masterPage->setDynamic1(createClubHistory());
$masterPage->renderPage();
