<?php
function createClubNews() {
    // Read the JSON content from club_news.json
    $jsonData = file_get_contents("data/club_news.json");
    $newsData = json_decode($jsonData, true);
    
    $newsArticles = '';
    foreach ($newsData['news'] as $article) {
        $newsArticles .= <<<ARTICLE
        <div class="card mb-3 article-card">
            <div class="card-body">
                <h5 class="card-title">{$article['title']}</h5>
                <p class="card-text">{$article['summary']}</p>
                <a href="article_page.php?article={$article['full_article_link']}" class="btn btn-primary">Read More</a>
            </div>
        </div>
ARTICLE;
    }
    
    $externalLinks = '';
    foreach ($newsData['external_links'] as $link) {
        $externalLinks .= <<<LINK
        <li class="list-group-item custom-list-group-item">
            <a href="{$link['url']}" target="_blank">{$link['title']}</a>
            <span class="badge badge-secondary">{$link['source']}</span>
        </li>
LINK;
    }
    
    $html = <<<CLUB_NEWS
    <div class="container">
        <h2>Club News</h2>
        <div>
            {$newsArticles}
        </div>
        <h3>External Links</h3>
        <ul class="list-group">
            {$externalLinks}
        </ul>
    </div>
CLUB_NEWS;
            
            return $html;
}
