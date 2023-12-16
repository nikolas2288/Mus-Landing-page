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
    <link rel="stylesheet" type="text/css" href="./assests/css/style.css">
</head>
<body>
    <div id="mainContain">
        <div id="topContainer">
            <div id="navBarContainer">
                <div class="navBar">
                    <a href="index.php" class="logo">
                        <img src="none">
                    </a>

                    <div class="group">
                        <div class="navItem">
                            <a href="" class="navItemLink">Search</a>
                        </div>
                    </div>
                    <div class="group">
                        <div class="navItem">
                            <a href="search.php" class="navItemLink">Browse</a>
                        </div>
                        <div class="navItem">
                            <a href="yourMusic.php" class="navItemLink">Your Music</a>
                        </div>
                        <div class="navItem">
                            <a href="profile.php" class="navItemLink">Reece Kenney</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="nowPlayingBarContainer">
            <div id="nowPlayingBar">
                <div id="nowPlayingLeft">
                    <div class="content">
                        <span class="albumLink">
                            <img class="albumArtwork" src="https://www.freeiconspng.com/thumbs/square-png/square-pattern-image-15.png">
                        </span>
                        <div class="trackInfo">
                            <span class="trackName">
                                <span>Break up</span>
                            </span>
                            <span class="artistName">
                                <span>Kizaru</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div id="nowPlayingCenter">
                    <div class="content playerControls">
                        <div class="buttons">
    
                            <button class="controlButton shuffle" title="Shuffle button">
                                <img src="./assests/img/icon/icons8-shuffle-50.png" alt="Shuffle">
                            </button>
                            <button class="controlButton previous" title="Previous button">
                                <img src="./assests/img/icon/previous-50.png" alt="Previous">
                            </button>
                            <button class="controlButton play" title="Play button">
                                <img src="./assests/img/icon/playStart-50.png" alt="Play">
                            </button>
                            <button class="controlButton pause" title="Pause button" style="display: none;">
                                <img src="./assests/img/icon/pause-50.png" alt="Pause">
                            </button>
                            <button class="controlButton next" title="Next button">
                                <img src="./assests/img/icon/next-50.png" alt="Next">
                            </button>
                            <button class="controlButton repeat" title="Repeat button">
                                <img src="./assests/img/icon/repeat-50.png" alt="Repeat">
                            </button>
    
                        </div>
    
                        <div class="playbackBar">
                            <span class="progressTime current">0.00</span>
                            <div class="progressBar">
                                <div class="progressBarBg">
                                    <div class="progress"></div>
                                </div>
                            </div>
                            <span class="progressTime remaining">0.00</span>
                        </div>
    
                    </div>
                </div>
                <div id="nowPlayingRight">
                    <div class="volumeBar">
                        <button class="controlButton volume" title="Volume button">
                            <img src="./assests/img/icon/volume-50.png" alt="Volume">
                        </button>
                        <div class="progressBar">
                            <div class="progressBarBg">
                                <div class="progress"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>