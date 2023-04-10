<?php
function createPlayerDetails($player, $userId = null, $username = null) {
    $additionalContentHtml = '';
    foreach ($player['additional_content'] as $content) {
        $additionalContentHtml .= "<p><a href='{$content['url']}' target='_blank'>{$content['title']}</a></p>";
    }
    
    // Convert the club_history array to a string
    $clubHistoryString = implode(', ', $player['club_history']);
    
    $opinionsHtml = createOpinionsSection($player['id'], $userId, $username);
    
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
        
        <h3>What fans think</h3>
        {$opinionsHtml}
    </div>
PLAYER_DETAILS;
        
        return $html;
}

function getPlayerById($id) {
    $filePath = "data/player_details/player_{$id}.json";
    
    // Check if the file exists
    if (!file_exists($filePath)) {
        return false;
    }
    
    // Read the JSON content from the corresponding player_{id}.json file
    $jsonData = file_get_contents($filePath);
    $player = json_decode($jsonData, true);
    
    return $player;
}

function createOpinionsSection($playerId, $userId = null, $username = null) {
    $opinions = getPlayerOpinions($playerId);
    
    $opinionsHtml = '';
    
    if (empty($opinions)) {
        $opinionsHtml .= "<p>No opinions found for this player.</p>";
    } else {
        foreach ($opinions as $opinion) {
            $opinionsHtml .= "<p><strong>{$opinion['username']}:</strong> {$opinion['opinion_text']}</p>";
        }
    }
    
    if ($userId !== null && $username !== null) {
        $opinionsHtml .= <<<OPINION_FORM
        <form action="post_opinion.php" method="POST">
            <input type="hidden" name="player_id" value="{$playerId}">
            <input type="hidden" name="user_id" value="{$userId}">
            <input type="hidden" name="username" value="{$username}">
            <div class="form-group">
                <label for="opinionText">Post your opinion:</label>
                <textarea class="form-control" name="opinionText" id="opinionText" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
OPINION_FORM;
    } else {
        $opinionsHtml .= "<p><a href='login_page.php'>Log in</a> to post an opinion.</p>";
    }
    
    return $opinionsHtml;
}
