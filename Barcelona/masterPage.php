<?php
session_start();
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
  
    private function createHeader() {
        $username = '';
        $signupOrSignout = '<a class="nav-link" href="login_page.php">Sign Up</a>';
        $profileLink = '';
        
        if (isset($_SESSION['username'])) {
            $username = '<li class="nav-item"><span class="nav-link">Welcome, ' . $_SESSION['username'] . '</span></li>';
            $signupOrSignout = '<a class="nav-link" href="logout.php">Sign Out</a>';
            $profileLink = '<li class="nav-item"><a class="nav-link" href="user_profile_page.php">Profile</a></li>';
        }
        
        $header = <<<HEADER
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{$this->title}</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Add jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5PR6eve17hf+oc_moDQbU6EurU6e9g_L5z7XIRW5" crossorigin="anonymous"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">FC Barcelona</a>
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
                {$username}
                {$profileLink}
                <li class="nav-item">
                    {$signupOrSignout}
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