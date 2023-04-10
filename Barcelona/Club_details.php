<?php
function createClubDetails() {
    // Read the JSON content from club_details.json
    $jsonData = file_get_contents("data/club_details.json");
    $clubDetails = json_decode($jsonData, true);

   if (is_array($clubDetails) && !empty($clubDetails)) {
    $html = <<<CLUB_DETAILS
    <div class="container">
        <h2>{$clubDetails['club_name']}</h2>
        <p>Stadium: {$clubDetails['stadium']}</p>
        <img src="images/camp_nou.jpg" class="img-fluid" alt="Stadium Image">
        <img src="images/camp_nou2.jpg" class="img-fluid" alt="Stadium Image">
        <p>Home Kit: {$clubDetails['home_kit']}</p>
        <img src="images/home-kit.jpg" class="img-fluid" alt="Home Kit Image">
        <p>Away Kit: {$clubDetails['away_kit']}</p>
        <img src="images/away-kit.jpg" class="img-fluid" alt="Away Kit Image">
        <p>League Participation: {$clubDetails['league_participation']}</p>
        
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Club History</h5>
                        <p class="card-text">Read more about the rich history of FC Barcelona.</p>
                        <a href="Club_history.php" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Club Management</h5>
                        <p class="card-text">Learn more about the management and key non-playing staff at FC Barcelona.</p>
                        <a href="Club_management.php" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
CLUB_DETAILS;
   } else {
       $html = "<p>Error: Club details could not be loaded. Please check the JSON file.</p>";
   }

    return $html;
}

