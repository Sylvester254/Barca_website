<?php
require_once 'masterPage.php';
require_once 'Club_details.php';

function createClubManagement() {
    $jsonData = file_get_contents("data/club_management.json");
    $clubManagement = json_decode($jsonData, true);

    $html = <<<CLUB_MANAGEMENT
    <div class="container club-management-container">
        <h2 class="club-name">{$clubManagement['club_name']} Management</h2>
        <h3 class="founded">Founded: {$clubManagement['founded']}</h3>
        
        <h3 class="section-title">President</h3>
        <div class="president">
            <h4 class="name">{$clubManagement['president']['name']}</h4>
            <p class="nationality">Nationality: {$clubManagement['president']['nationality']}</p>
            <p class="term-start">Term start: {$clubManagement['president']['term_start']}</p>
        </div>
        
        <h3 class="section-title">Board Members</h3>
        <div class="board-members">
CLUB_MANAGEMENT;
    
    foreach ($clubManagement['board_members'] as $boardMember) {
        $html .= <<<BOARD_MEMBER
            <div class="board-member">
                <h4 class="name">{$boardMember['name']}</h4>
                <p class="position">{$boardMember['position']}</p>
                <p class="nationality">Nationality: {$boardMember['nationality']}</p>
            </div>
BOARD_MEMBER;
    }
    
    $html .= <<<HEAD_COACH
        </div>
        
        <h3 class="section-title">Head Coach</h3>
        <div class="head-coach">
            <h4 class="name">{$clubManagement['head_coach']['name']}</h4>
            <p class="nationality">Nationality: {$clubManagement['head_coach']['nationality']}</p>
            <p class="appointed">Appointed: {$clubManagement['head_coach']['appointed']}</p>
        </div>
    </div>
HEAD_COACH;
    

    return $html;
}

$masterPage = new masterPage("Club Management");
$masterPage->setDynamic1(createClubManagement());
$masterPage->renderPage();
