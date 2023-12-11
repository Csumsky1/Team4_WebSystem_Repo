<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $account_type = $_POST["account_type"];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $host = "localhost";
    $user = "asosa7";
    $pass = "asosa7";
    $dbname = "asosa7";
    $mysqli = new mysqli($host, $user, $pass, $dbname);

    if ($mysqli->connect_error) {
        echo json_encode(["error" => "Could not connect to the server"]);
        exit();
    }

    //check if the email already exists
    $checkEmailQuery = $mysqli->prepare("SELECT id FROM user_data WHERE email = ?");
    $checkEmailQuery->bind_param("s", $email);
    $checkEmailQuery->execute();
    $emailResult = $checkEmailQuery->get_result();

    //check if the username already exists
    $checkUsernameQuery = $mysqli->prepare("SELECT id FROM user_data WHERE username = ?");
    $checkUsernameQuery->bind_param("s", $username);
    $checkUsernameQuery->execute();
    $usernameResult = $checkUsernameQuery->get_result();

    $errors = [];

    if ($emailResult->num_rows > 0) {
        $errors[] = "Email already exists";
    }

    if ($usernameResult->num_rows > 0) {
        $errors[] = "Username already exists";
    }

    $checkEmailQuery->close();
    $checkUsernameQuery->close();

    if (!empty($errors)) {
        echo json_encode(["error" => implode(" and ", $errors)]);
        $mysqli->close();
        exit();
    }

    $createTableSQL = "
    CREATE TABLE IF NOT EXISTS user_data (
        id INT AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(255) NOT NULL,
        last_name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        username VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        account_type VARCHAR(20) NOT NULL
    )";

    //sending response to AJAX
    if (!$mysqli->query($createTableSQL)) {
        echo json_encode(["error" => "Error creating table: " . $mysqli->error]);
        exit();
    }

    //prepared statements for security, also binds statement for data insertion
    $stmt = $mysqli->prepare("INSERT INTO user_data (first_name, last_name, email, username, password, account_type) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $first_name, $last_name, $email, $username, $hashed_password, $account_type);

    //sending response to AJAX
    if (!$stmt->execute()) {
        echo json_encode(["error" => "Error: " . $stmt->error]);
        exit();
    }

    $stmt->close();
    $mysqli->close();
    
    //include a success message in the response
    echo json_encode(["success" => "Thank you for creating an account!\nPlease go ahead and login."]);
}
?>
