<?php
// Include the Club_details.php and MasterPage.php files
require_once("Club_details.php");
require_once("masterPage.php");

// Call the createClubDetails() function to generate the club details content
$clubDetailsContent = createClubDetails();

// Create an instance of the MasterPage class with a title for the club details page
$masterPage = new masterPage("Club Details");

// Set the dynamic content of the MasterPage object with the club details content
$masterPage->setDynamic1($clubDetailsContent);
$masterPage->setDynamic2(""); // Set it to an empty string since we don't need any additional content in this case

// Render the master page, which will include the club details content and navigation
$masterPage->renderPage();
?>
