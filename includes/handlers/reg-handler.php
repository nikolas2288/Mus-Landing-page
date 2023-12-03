<?php
function sanitizeFormText($textInput){
    $textInput = strip_tags($textInput);
    $textInput = str_replace(" ", "", $textInput);
    $textInput = ucfirst(strtolower($textInput));
    return $textInput;
}
function sanitizeFormUsername($textInput){
    $textInput = strip_tags($textInput);
    $textInput = str_replace(" ", "", $textInput);
    return $textInput;
}
function sanitizeFormPassword($textInput){
    $textInput = strip_tags($textInput);
    return $textInput;
}
if (isset($_POST['regButton'])) {
    $userName = sanitizeFormUsername($_POST['regUserName']);
    $firstName = sanitizeFormText($_POST['regFirstName']);
    $lastName = sanitizeFormText($_POST['regLastName']);
    $email = sanitizeFormText($_POST['regEmail']);
    $password = sanitizeFormPassword($_POST['regPassword']);
    $password2 = sanitizeFormPassword($_POST['regPassword2']);

    $wasSuccessful = $account->register($userName, $firstName, $lastName, $email, $password, $password2);
    print($wasSuccessful);
    if ($wasSuccessful == true) {
        $_SESSION['userLoggedIn'] = $userName;
        header("Location: index.php");
    }
}
?>