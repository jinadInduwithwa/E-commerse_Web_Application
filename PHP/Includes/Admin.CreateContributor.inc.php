<?php
if (isset($_POST["submit"])) {
    $firstName = $_POST["fName"];
    $lastName = $_POST["lName"];
    $Email = $_POST["eMail"];
    $phoneNumber = $_POST["phoneNo"];
    $password = $_POST["pwd"];
    $reEnterPassword = $_POST["reEnterPwd"];
    $homeNumber = $_POST["homeNO"];
    $streetName = $_POST["streetName"];
    $cityName = $_POST["cityName"];
    $countryName = $_POST["countryName"];
    $role = "contributor";

    require_once './dbh.inc.php';

    // Perform validation checks before proceeding
    if (empty($firstName) || empty($lastName) || empty($Email) || empty($phoneNumber) || empty($password) || empty($reEnterPassword) || empty($homeNumber) || empty($streetName) || empty($cityName) || empty($countryName)) {
        echo "<script>alert('Empty User Input')</script>";
        echo "<script>window.open('../Admin.CreateContributor.php','_self')</script>";
        exit();
    }

    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid Email')</script>";
        echo "<script>window.open('../Admin.CreateContributor.php','_self')</script>";
        exit();
    }

    $pattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@#$%^&+=]).{8,}$/";
    if (!preg_match($pattern, $password)) {
        echo "<script>alert('Password must contain at least one uppercase letter, one lowercase letter, one digit, one special character, and be at least 8 characters long')</script>";
        echo "<script>window.open('../Admin.CreateContributor.php','_self')</script>";
        exit();
    }

    if ($password !== $reEnterPassword) {
        echo "<script>alert('Password Not Matched')</script>";
        echo "<script>window.open('../Admin.CreateContributor.php','_self')</script>";
        exit();
    }

    // Check if the email already exists
    $sql = "SELECT * FROM users WHERE usersEmail = ?"; // No need for a semicolon here

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "<script>window.open('../Admin.CreateContributor.php','_self')</script>";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $Email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        echo "<script>alert('Email Exists')</script>";
        echo "<script>window.open('../Admin.CreateContributor.php','_self')</script>";
        exit();
    }

    mysqli_stmt_close($stmt);

    // Create a new contributor
    $sql = "INSERT INTO users (usersFirstName, usersLastName, usersEmail, usersPhoneNumber, usersPassword, usersHomeNumber, usersStreet, usersCity, usersCountry, role) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "<script>alert('Connection Lost')</script>";
        echo "<script>window.open('../Admin.CreateContributor.php','_self')</script>";
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssssssss", $firstName, $lastName, $Email, $phoneNumber, $hashedPassword, $homeNumber, $streetName, $cityName, $countryName, $role);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    echo "<script>alert('Successfully Registered')</script>";
    echo "<script>window.open('../Admin.CreateContributor.php','_self')</script>";
    exit();
}
?>
