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
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    // Perform validation (e.g., check for duplicate emails)

    // Insert user data into the database
    $sql = "INSERT INTO $table_name (email, password) VALUES ('$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
