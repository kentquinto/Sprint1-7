<?php
session_start();
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $phone = $_POST['telephone'];

    function validateName(string $name)  {
        if (empty($name)) {
            throw new Exception("Name must not be empty!");
        }
        return $name;
    }
    function validateEmail(string $email) {
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
    $name = validateName($name);
    $email = validateEmail($email);
    $age = validateAge($age);
    $phone = validatePhone($phone);

    $_SESSION['username'] = $name;
    $_SESSION['useremail'] = $email;
    $_SESSION['userage'] = $age;
    $_SESSION['userphone'] = $phone;

    echo "Validation successful!";

} catch (Exception $exception) {
    echo "Error! " . $exception->getMessage();
}
echo "Form Data:" . "<br>";
echo "Name: " . $name . "<br>";
echo "Email: " . $email . "<br>";
echo "Age: " . $age . "<br>";
echo "Telephone: " . $phone . "<br>";
?>