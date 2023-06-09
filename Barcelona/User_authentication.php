<?php
// Reads the JSON content from the user_profile.json file
function readUsersFromFile() {
    $jsonData = file_get_contents("data/user_profile.json");
    return json_decode($jsonData, true);
}

// Writes the JSON content to the user_profile.json file
function writeUsersToFile($usersArray) {
    $jsonData = json_encode($usersArray);
    file_put_contents("data/user_profile.json", $jsonData);
}

// Registers a new user
function registerUser($username, $email, $password, $first_name, $last_name, $country, $favorite_player) {
    $users = readUsersFromFile();

    // Check if the username or email already exists
    foreach ($users['users'] as $user) {
        if ($user['username'] == $username) {
            return "Username already exists. Please use a different username.";
        }

        if ($user['email'] == $email) {
            return "Email already exists. Please log in instead.";
        }
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Add the new user
    $newUser = [
        "id" => count($users['users']) + 1,
        "username" => $username,
        "email" => $email,
        "password" => $hashed_password,
        "first_name" => $first_name,
        "last_name" => $last_name,
        "country" => $country,
        "favorite_player" => $favorite_player,
        "registration_date" => date("Y-m-d")
    ];

    $users['users'][] = $newUser;
    writeUsersToFile($users);

    return "User registered successfully. Please log in.";
}

// Verifies the user login
function loginUser($username, $password) {
    $users = readUsersFromFile();
    
    foreach ($users['users'] as $user) {
        if ($user['username'] == $username) {
            if (password_verify($password, $user['password'])) {
                // Set session variables
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                
                // Redirect the user to index.php
                header('Location: index.php');
                exit;
            } else {
                return "Invalid password. Please try again.";
            }
        }
    }
    
    return "Username not found. Please register.";
}

function createProfileContent($user) {
    $html = <<<PROFILE
    <div class="container profile-container">
        <h2>Your Profile</h2>
        <div class="profile-info">
            <p><strong>Username:</strong> {$user['username']}</p>
            <p><strong>Email:</strong> {$user['email']}</p>
            <p><strong>First Name:</strong> {$user['first_name']}</p>
            <p><strong>Last Name:</strong> {$user['last_name']}</p>
            <p><strong>Country:</strong> {$user['country']}</p>
            <p><strong>Favorite Player:</strong> {$user['favorite_player']}</p>
            <p><strong>Registration Date:</strong> {$user['registration_date']}</p>
        </div>
    </div>
PROFILE;
    
    
    
    return $html;
}

function getUserById($userId) {
    $users = readUsersFromFile();
    
    foreach ($users['users'] as $user) {
        if ($user['id'] == $userId) {
            return $user;
        }
    }
    
    return null;
}

