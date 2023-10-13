<?php
$db_name = "mydatabase";
$user = "root";
$password = "";
$table_name = "useraccounts";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection code here
    $conn = mysqli_connect("127.0.0.1", $user, $password, $db_name);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $email = $_POST["email"];
    $password = $_POST["password"];

    // Fetch the user's data from the database
    $sql = "SELECT * FROM $table_name WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // Verify the password
        if (password_verify($password, $row["password"])) {
            echo "Login successful!";
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "User not found!";
    }

    mysqli_close($conn);
}
?>
