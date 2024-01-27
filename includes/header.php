<?php 
include("includes/config.php");
include("includes/classes/Artist.php");
include("includes/classes/Album.php");
include("includes/classes/Song.php");


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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="assests/js/script.js"></script>
</head>
<body>
    <script>
        var audioElement = new Audio();  
        audioElement.setTrack("assests/music/21 SAVAGE - BREAK DA LAW.mp3");
        audioElement.audio.play()
    </script>
    <div id="mainContain">
        <div id="topContainer">
           <?php include("includes/navBarContainer.php") ?>
           <div id="mainViewContainer">
               <div id="mainContent">
    