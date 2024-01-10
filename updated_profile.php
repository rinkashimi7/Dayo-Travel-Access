<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "dayo_travel_access_user_db";

    $connect = mysqli_connect($hostname, $username, $password, $databaseName);

    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $fullname = $_POST['fullname'];
    $newPassword = $_POST['new_password'];

    if (!isset($_POST['confirm_password'])) {
        echo 'Confirm password field is missing.';
        exit;
    }

    $confirmPassword = $_POST['confirm_password'];

    if ($newPassword !== $confirmPassword) {
        echo 'Passwords do not match.';
        exit;
    }

    // Retrieve the entity ID from the registration table
    $query = "SELECT id FROM registration LIMIT 1";
    $result = mysqli_query($connect, $query);

    if (!$result) {
        echo 'Failed to retrieve entity ID. Error: ' . mysqli_error($connect);
        exit;
    }

    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];

    $updateQuery = "UPDATE registration SET fullname = '$fullname', password = '$newPassword' WHERE id = '$id'";

    $result = mysqli_query($connect, $updateQuery);

    if ($result) {
        header("Location: updated.html");
        exit;
    } else {
        echo 'Failed to update. Error: ' . mysqli_error($connect);
    }

    mysqli_close($connect);
}
?>