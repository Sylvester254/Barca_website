<?php

function createPlayerDetails($playerId) {
    $filePath = "data/player_details/player_{$playerId}.json";
    
    // Check if the file exists
    if (!file_exists($filePath)) {
        return "<div class='container'><p>Error: Player details not found. Please check if the file '{$filePath}' exists.</p></div>";
    }
    
    // Read the JSON content from the corresponding player_{id}.json file
    $jsonData = file_get_contents($filePath);
    $player = json_decode($jsonData, true);
    
    $additionalContentHtml = '';
    foreach ($player['additional_content'] as $content) {
        $additionalContentHtml .= "<p><a href='{$content['url']}' target='_blank'>{$content['title']}</a></p>";
    }

    // Convert the club_history array to a string
    $clubHistoryString = implode(', ', $player['club_history']);
    
    $html = <<<PLAYER_DETAILS
    <div class="container">
        <h2>{$player['name']}</h2>
        <p>Position: {$player['position']}</p>
        <p>Age: {$player['age']}</p>
        <p>Club History: {$clubHistoryString}</p>
        <p>Current Season Appearances: {$player['current_season_appearances']}</p>
        <p>Current Season Goals: {$player['current_season_goals']}</p>
        <p>Bio: {$player['bio']}</p>
        
        <h3>Additional Content</h3>
        {$additionalContentHtml}
    </div>
PLAYER_DETAILS;

    return $html;
}
