<?php
require_once 'masterPage.php';

function readArticle($articleFile) {
    $jsonData = file_get_contents("data/{$articleFile}");
    $article = json_decode($jsonData, true);

    $html = <<<ARTICLE
    <div class="container">
        <div class="article-container">
            <h2>{$article['title']}</h2>
            <img src="path/to/your/image.jpg" alt="Article Image">
            <p>{$article['content']}</p>
        </div>
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
