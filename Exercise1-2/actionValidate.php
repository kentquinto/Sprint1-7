<?php
session_start();
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $phone = $_POST['telephone'];

    echo "Form Data" . "\n";
    echo "Name: " . $name . "\n";
    echo "Email: " . $email . "\n";
    echo "Age: " . $age . "\n";
    echo "Telephone: " . $phone . "\n";

    $_SESSION['username'] = $name;
    $_SESSION['useremail'] = $email;
    $_SESSION['userage'] = $age;
    $_SESSION['userphone'] = $phone;

    function validateName($name) {
        if(empty($name) || !is_string($name)) {
            throw new Exception("Name must contain only letters and cannot be empty!");
        }
        return $name;
    }
    function validateEmail($email) {
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email!");
        }
        return $email;
    }
    function validateAge($age) {
        if (empty($age) || $age <= 0 || !is_numeric($age)) {
            throw new Exception("Invalid age!");
        }
        return $age;
    }
    function validatePhone($phone) {
        if (empty($phone) || !preg_match("/^[0-9]{9}$/", $phone)) {
            throw new Exception("Invalid phone number! It should be 9 digits!");
        }
        return $phone;
}

try {
    validateName($name);
    validateEmail($email);
    validateAge($age);
    validatePhone($phone);
    echo "Validation successful!";
} catch (Exception $exeception) {
    echo "Error! " . $exeception->getMessage();
}
?>