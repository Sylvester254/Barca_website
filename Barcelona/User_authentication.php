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
                return "Logged in successfully.";
            } else {
                return "Invalid password. Please try again.";
            }
        }
    }

    return "Username not found. Please register.";
}
