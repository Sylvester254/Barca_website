<?php
session_start();
require_once 'player_opinion.php';

// Check if the form data is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['player_id'], $_POST['user_id'], $_POST['username'], $_POST['opinionText'])) {
    $playerId = $_POST['player_id'];
    $userId = $_POST['user_id'];
    $username = $_POST['username'];
    $opinionText = $_POST['opinionText'];

    // Call the postOpinion() function
    postOpinion($playerId, $userId, $username, $opinionText);

    // Redirect the user back to the player details page
    header("Location: player_details_page.php?id={$playerId}");
    exit;
}
else {
    echo "Form data not submitted or missing required fields.";
}

