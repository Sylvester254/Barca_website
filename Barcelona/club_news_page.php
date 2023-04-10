<?php
// Include the Club_details.php and MasterPage.php files
require_once("Club_news.php");
require_once("masterPage.php");

$clubDetailsContent = createClubNews();

$masterPage = new masterPage("Club News");

$masterPage->setDynamic1($clubDetailsContent);
$masterPage->setDynamic2(""); // Set it to an empty string since we don't need any additional content in this case

$masterPage->renderPage();
?>
