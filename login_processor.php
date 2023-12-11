<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $host = "localhost";
    $user = "asosa7"; 
    $pass = "asosa7"; 
    $dbname = "asosa7"; 
    $mysqli = new mysqli($host, $user, $pass, $dbname);

    $hashedPasswordInput = password_hash($password, PASSWORD_DEFAULT);

    if ($mysqli->connect_error) {
        echo json_encode(["error" => "Could not connect to the server"]);
        exit();
    }

    $checkEmailQuery = $mysqli->prepare("SELECT id, password, username, account_type FROM user_data WHERE email = ?");
    $checkEmailQuery->bind_param("s", $email);
    $checkEmailQuery->execute();
    $emailResult = $checkEmailQuery->get_result();

    if ($emailResult->num_rows > 0) {
        $userData = $emailResult->fetch_assoc();
        $storedPasswordHash = $userData['password'];
        $account_type = $userData['account_type'];

        if (password_verify($password, $storedPasswordHash)) {
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['user_name'] = $userData['username'];
            $_SESSION['admin'] = ($userData['account_type'] === 'admin');
            
            echo json_encode(["success" => "Login successful", "account_type" => $account_type]);
        } else {
            echo json_encode(["error" => "Login failed. Please try again."]);
        }
    } else {
        echo json_encode(["error" => "Login failed."]);
    }

    $checkEmailQuery->close();
    $mysqli->close();
}
?>
