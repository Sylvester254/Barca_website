<?php
class masterPage {
    private $title;
    private $dynamic1;
    private $dynamic2;

    public function __construct($title) {
        $this->title = $title;
    }

    public function setDynamic1($dynamic1) {
        $this->dynamic1 = $dynamic1;
    }

    public function setDynamic2($dynamic2) {
        $this->dynamic2 = $dynamic2;
    }

    public function renderPage() {
        echo $this->createHeader() . $this->dynamic1 . $this->dynamic2 . $this->createFooter();
    }
    
    public function setContent($content) {
        $this->content = $content;
    }
    
    private function createHeader() {
        $header = <<<'HEADER'
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{$this->title}</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Football Club</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="club_news_page.php">Club News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="squad_details_page.php">Squad Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="player_details_page.php">Player Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login_page.php">Sign Up</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Page Content -->
    <div class="container">
HEADER;

        return $header;
    }

    private function createFooter() {
        $footer = <<<'FOOTER'
    </div>
    <!-- Footer -->
    <footer class="footer mt-auto py-3 bg-dark">
        <div class="container">
            <span class="text-muted">&copy; 2023 Football Club. All Rights Reserved.</span>
        </div>
    </footer>
    <!-- jQuery and Bootstrap Bundle JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="js/custom.js"></script>
</body>
</html>
FOOTER;

        return $footer;
    }
}