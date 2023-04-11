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
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Add jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5PR6eve17hf+oc_moDQbU6EurU6e9g_L5z7XIRW5" crossorigin="anonymous"></script>
    <!-- Add Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5PR6eve17hf+oc_moDQbU6EurU6e9g_L5z7XIRW5" crossorigin="anonymous">

</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-image: linear-gradient(to right, #a81924, #204197);">
        <a class="navbar-brand" href="index.php">
            <img src="images/Barcelona-Logo.png" alt="FC Barcelona" width="80" height="50" class="d-inline-block align-top">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="club_news_page.php">Club News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="squad_details_page.php">Squad Details</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    {$username}
                </li>
                <li class="nav-item">
                    {$profileLink}
                </li>
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
    <footer class="footer mt-auto py-3" style="background-image: linear-gradient(to right, #a81924, #204197);">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="text-white">&copy; Copyright FC Barcelona.</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-unstyled text-small">
                        <li><a class="text-white" href="#">Legal Terms</a></li>
                        <li><a class="text-white" href="#">Privacy Policy</a></li>
                        <li><a class="text-white" href="#">Cookies</a></li>
                        <li><a class="text-white" href="#">Accessibility</a></li>
                        <li><a class="text-white" href="#">Contact Us</a></li>
                        <li><a class="text-white" href="#">Support/FAQs</a></li>
                    </ul>
                </div>
                <div class="col-md-4 text-center">
                    <a href="#" class="text-white"><i class="fab fa-facebook-f mr-2"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-twitter mr-2"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-instagram mr-2"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
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