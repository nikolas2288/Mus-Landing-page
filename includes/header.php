<?php 
include("includes/config.php");
if (isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
} else {
    header("Location: register.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>index</title>
    <link rel="stylesheet" type="text/css" href="assests/css/style.css">
</head>
<body>
    <div id="mainContain">
        <div id="topContainer">
           <?php include("includes/navBarContainer.php") ?>
           <div id="mainViewContainer">
               <div id="mainContent">
    