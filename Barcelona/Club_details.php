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
        <div class="row mt-4">
            <div class="col-md-6 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="stadium-img-wrapper">
                            <img src="images/camp_nou.jpg" class="img-fluid stadium-img" alt="Stadium Image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="stadium-img-wrapper">
                            <img src="images/camp_nou2.jpg" class="img-fluid stadium-img" alt="Stadium Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <div class="row mt-4">
        <div class="col-md-6 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Home Kit: {$clubDetails['home_kit']}</h5>
                    <div class="kit-img-wrapper">
                        <img src="images/home-kit.jpg" class="img-fluid kit-img" alt="Home Kit Image">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Away Kit: {$clubDetails['away_kit']}</h5>
                    <div class="kit-img-wrapper">
                        <img src="images/away-kit.jpg" class="img-fluid kit-img" alt="Away Kit Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
        
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Club History</h5>
                        <p class="card-text">Read more about the rich history of FC Barcelona.</p>
                        <a href="Club_history.php" class="btn btn-primary btn-gradient">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Club Management</h5>
                        <p class="card-text">Learn more about the management and key non-playing staff at FC Barcelona.</p>
                        <a href="Club_management.php" class="btn btn-primary btn-gradient">Read More</a>
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

