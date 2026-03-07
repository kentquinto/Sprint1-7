<?php
session_start();

$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];

echo "Form Data" . "\n";
echo "Name: " . $name . "\n";
echo "Email: " . $email . "\n";
echo "Age: " . $age . "\n";

$_SESSION['username'] = $name;
$_SESSION['useremail'] = $email;
$_SESSION['userage'] = $age;

function validateName($name) {
    if(empty($name) || !is_string($name)) {
        throw new Exception("Name must contain only letters and cannot be empty.");
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
try {
    validateName($name);
    validateEmail($email);
    validateAge($age);
    echo "Validation successful!";
} catch (Exception $exeception) {
    echo "Error! " . $exeception->getMessage();
}
?>