<?php

include('includes/header.php'); 

if (isset($_GET['id'])) {
    $albumId = $_GET['id'];
    // echo $_GET['id'];
} 

else {
    // echo 'Id not set';
    header("Location: index.php");
}

$album = new Album($con, $albumId);
$artist = $album->getArtist();
?>

<div class="entityInfo">
    <div class="leftSection">
        <img src="<?php echo $album->getArtworkPath(); ?>">
    </div>
    <div class="rightSection">
        <h2><?php echo $album->getTitle(); ?></h2>
        <p>By <?php echo $artist->getName(); ?></p>
        <p><?php echo $album->getNumberOfSongs(); ?> Songs</p>
    </div>
</div>

<div class="tracklistContainer">
    <ul class="trackList">
        <?php 
        $songIdArray = $album->getSongIds();
        $i = 1;
        foreach($songIdArray as $songId) {
            $albumSong = new Song($con, $songId);
            $albumArtist = $albumSong->getArtist();
            echo "<li class='tracklistRow'>
                    <div class='trackCount'>
                        <img class='play' src='assests/img/icon/play-white-sml30.png'>
                        <span class='trackNumber'>$i</span>
                    </div>
                    <div class='trackInfo'>
                        <span class='trackName'>" . $albumSong->getTitle() . "</span>
                        <span class='artistName'>" . $albumArtist->getName() . "</span>
                    </div>
                    <div class='trackOptions'>
                        <img class='optionButton' src='./assests/img/icon/more-50.png'>
                    </div>
                    <div class='trackDuration' >
                        <span class='duration'>" . $albumSong->getDuration() . "</span>
                    </div>
                </li>";
        
            $i = $i + 1;
        };
        ?>
    </ul>
</div>

<?php include('includes/footer.php'); ?>