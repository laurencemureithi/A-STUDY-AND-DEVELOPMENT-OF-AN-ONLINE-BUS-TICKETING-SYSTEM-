<?php
// include external database connection file
require_once('db_connect.php');

// initialize variable to track validation errors
$errors = array();

// validate form data
if (empty($_POST['name'])) {
    $errors[] = 'Name is required';
}

if (empty($_POST['username'])) {
    $errors[] = 'Username is required';
}
if (empty($_POST['phone_number'])) {
    $errors[] = 'phone number is required';
}

if (empty($_POST['password'])) {
    $errors[] = 'Password is required';
}

// if there are validation errors, redirect back to the form with error messages
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header('Location:signup.php');
    exit;
}

// retrieve form data
$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
$phone_number = $_POST['phone_number'];


// set default values for user_type and status
$user_type = 2;
$status = 1;

// set current datetime for date_updated field
$date_updated = date('Y-m-d H:i:s');

// prepare SQL statement to insert data into users table
$sql = "INSERT INTO users (name, user_type, username, password, status, date_updated, phone_number)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

// execute SQL statement with form data
$stmt->execute([$name, $user_type, $username, $password, $status, $date_updated, $phone_number]);

// redirect user to a success page
header('Location: success.php');
exit;
?>
