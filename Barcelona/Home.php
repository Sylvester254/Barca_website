<?php
// ----INCLUDE APIS------------------------------------
// Include our Website API
include ("api/api.inc.php");

// ----PAGE GENERATION LOGIC---------------------------
function createPage()
{
    $tcontent = <<<PAGE
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2>Team Spotlight:</h2>
                    <h4>
                        <span class="badge badge-success">This Week</span> FC Barcelona
                    </h4>
                    <p>
                        <img src="img/ph-320x180.png" class="img-fluid" />
                    </p>
                    <p class="text-primary">
                        Founded in 1899 by a group of Swiss, English and Catalan
                        footballers led by Joan Gamper, the club has become a symbol of
                        Catalan culture and Catalanism, hence the motto <strong>"Més que un
                            club" (English: "More than a club").</strong>
                    </p>
                    <p>
                        Unlike many other football clubs, the supporters own and operate
                        Barcelona. It is the second most valuable sports team in the world,
                        worth <em>$3.56 billion</em>, and the world's second richest
                        football club in terms of revenue, with an annual turnover of <em>€560.8 million</em>.
                    </p>
                    <p>The official Barcelona anthem is the "Cant del Barça", written by
                        Jaume Picas and Josep Maria Espinàs.</p>
                    <p>Domestically, Barcelona has won 24 La Liga, 28 Copa del Rey, 12
                        Supercopa de España, 3 Copa Eva Duarte and 2 Copa de la Liga
                        trophies, as well as being the record holder for the latter four
                        competitions.</p>
                    <a class="btn btn-info" href="club.php">Find out More</a>
                </div>
                <div class="col-lg-6">
                    <h2>Meet the Players:</h2>
                    <h4>
                        <span class="badge badge-danger">Updated</span>The kings of
                        Catalonia.
                    </h4>
                    <p>
                        <img src="img/ph-320x180.png" class="img-fluid" />
                    </p>
                    <p class="text-primary">Catch up on all of the news relating to Barcelona's superstars:</p>
                    <div class="list-group">
                        <!-- Add list items here -->
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <div class="alert alert-dismissible alert-warning">
                        <button class="close" type="button" data-dismiss="alert">&times;</button>
                        <h4>Welcome!</h4>
                        <p>This site is updated on a weekly basis. Make sure you check back
                            regularly.</p>
                    </div>
                </div>
            </div>
        </div>
PAGE;
    return $tcontent;
}

// ----BUSINESS LOGIC---------------------------------
$tpagecontent = createPage();

// ----BUILD OUR HTML PAGE----------------------------
// Create an instance of our Page
// class, you should modify it to include the necessary Bootstrap files and structure as described in my previous response.

// ----BUSINESS LOGIC---------------------------------
$tpagecontent = createPage();

// ----BUILD OUR HTML PAGE----------------------------
// Create an instance of our Page class
$tindexpage = new MasterPage("Home Page");
$tindexpage->setDynamic2($tpagecontent);
$tindexpage->renderPage();

?>