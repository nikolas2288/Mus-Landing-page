<?php 
$songQuery = mysqli_query($con, "SELECT * FROM songs ORDER BY RAND() LIMIT 10");
$resultArray = array();
while ($row = mysqli_fetch_array($songQuery)) {
    array_push($resultArray, $row['id']);
}
$jsonArray = json_encode($resultArray);
?>

<script>
    
    $(document).ready(function() {
        currentPlaylist = <?php echo $jsonArray; ?>; 
        audioElement = new Audio();
        setTrack(currentPlaylist[0], currentPlaylist, true);   
        
        $(".playbackBar .progressBar").mousedown(() => {
            mouseDown = true
        });
        $(".playbackBar .progressBar").mousemove((e) => {
            if (mouseDown == true) {
                timeFromOffset(e, this)
            }
        });
        $(".playbackBar .progressBar").mouseup((e) => {
            timeFromOffset(e, this)
        });
        $(document).mouseup(() => {
            mouseDown = false;
        })
    });

    var timeFromOffset = (mouse, progressBar) => {
        var percentage = mouse.offsetX / $(progressBar).width() * 100;
        var seconds = audioElement.audio.duration * (percentage / 100);
        audioElement.setTime(seconds);
    }

    function setTrack(trackId, newPlaylist, play) {
        $.post("includes/handlers/ajax/getSongJson.php", {songId: trackId}, function(data) {
            var track = JSON.parse(data);
            $(".trackName span").text(track.title);
            
            $.post("includes/handlers/ajax/getArtistJson.php", {artistId: track.artist}, function(data){
                var artist = JSON.parse(data);
                $(".artistName span").text(artist.name);
            });
            $.post("includes/handlers/ajax/getAlbumJson.php", {albumId: track.album}, function(data){
                var album = JSON.parse(data);
                $(".albumLink img").attr("src", album.artworkPath);
            });
            audioElement.setTrack(track);
            playSong();
        })

        if (play == true) {
            audioElement.play();
        }
    };


    var playSong = () => {
        if (audioElement.audio.currentTime == 0) {
            $.post("includes/handlers/ajax/updatePlays.php", { songId: audioElement.currentlyPlaying.id });
        } 

        $(".controlButton.play").hide();
        $(".controlButton.pause").show();
        audioElement.play();
    };
    var pauseSong = () => {
        $(".controlButton.play").show();
        $(".controlButton.pause").hide();
        audioElement.pause();
    };
</script>

<div id="nowPlayingBarContainer">
    <div id="nowPlayingBar">
        <div id="nowPlayingLeft">
            <div class="content">
                <span class="albumLink">
                    <img class="albumArtwork" src="https://www.freeiconspng.com/thumbs/square-png/square-pattern-image-15.png">
                </span>
                <div class="trackInfo">
                    <span class="trackName">
                        <span></span>
                    </span>
                    <span class="artistName">
                        <span></span>
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
                    <button class="controlButton play" title="Play button" onclick="playSong()">
                        <img src="./assests/img/icon/playStart-50.png" alt="Play">
                    </button>
                    <button class="controlButton pause" title="Pause button" style="display: none;" onclick="pauseSong()">
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