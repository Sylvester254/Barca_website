<?php
// Reads the JSON content from the player_opinions.json file
function readPlayerOpinionsFromFile() {
    $jsonData = file_get_contents("data/player_opinion.json");
    return json_decode($jsonData, true);
}

// Writes the JSON content to the player_opinions.json file
function writePlayerOpinionsToFile($opinionsArray) {
    $jsonData = json_encode($opinionsArray);
    file_put_contents("data/player_opinion.json", $jsonData);
}

// Posts a new opinion
function postOpinion($playerId, $userId, $username, $opinionText) {
    $opinions = readPlayerOpinionsFromFile();

    $newOpinion = [
        "id" => count($opinions['opinions']) + 1,
        "player_id" => $playerId,
        "user_id" => $userId,
        "username" => $username,
        "opinion_text" => $opinionText,
        "post_date" => date("Y-m-d H:i:s")
    ];

    $opinions['opinions'][] = $newOpinion;
    writePlayerOpinionsToFile($opinions);
}

// Fetches opinions for a specific player
function getPlayerOpinions($playerId) {
    $opinions = readPlayerOpinionsFromFile();

    $playerOpinions = array_filter($opinions['opinions'], function ($opinion) use ($playerId) {
        return $opinion['player_id'] == $playerId;
    });

    return $playerOpinions;
}
