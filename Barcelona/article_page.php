<?php
require_once 'masterPage.php';

function readArticle($articleFile) {
    $jsonData = file_get_contents("data/{$articleFile}");
    $article = json_decode($jsonData, true);

    $html = <<<ARTICLE
    <div class="container">
        <h2>{$article['title']}</h2>
        <p>{$article['content']}</p>
    </div>
ARTICLE;

    return $html;
}

// Read the article JSON file from the query parameter
$articleFile = isset($_GET['article']) ? $_GET['article'] : '';

if (!empty($articleFile)) {
    $masterPage = new masterPage("News Article");
    $masterPage->setDynamic1(readArticle($articleFile));
    $masterPage->renderPage();
} else {
    echo 'Error: No article file specified.';
}
