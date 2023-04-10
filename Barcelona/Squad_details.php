<?php
function createSquadDetails() {
    // Read the JSON content from squad.json
    $jsonData = file_get_contents("data/squad.json");
    $squad = json_decode($jsonData, true);

    // Generate the table rows
    $tableRows = '';
    foreach ($squad as $player) {
        $tableRows .= <<<ROW
<tr>
    <td><a href="player_details_page.php?id={$player['id']}">{$player['name']}</a></td>
    <td>{$player['position']}</td>
    <td>{$player['nationality']}</td>
</tr>
ROW;
    }

    // Create the HTML content with the generated table rows
    $html = <<<SQUAD_DETAILS
<div class="container">
    <h2>FC Barcelona Squad</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Nationality</th>
            </tr>
        </thead>
        <tbody>
            {$tableRows}
        </tbody>
    </table>
</div>
SQUAD_DETAILS;

    return $html;
}
