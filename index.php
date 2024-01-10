<?php include('includes/header.php'); ?>

<h1 class="pageHeadingBig">Salute</h1>
<div class="gridViewContainer">
    <?php
        $albumQuery = mysqli_query($con, "SELECT * FROM albums ORDER BY RAND() LIMIT 10");
        while($row = mysqli_fetch_array($albumQuery)){
            // echo $row['title'] . "<br>";
            
            echo "<div class='gridViewItem'>
                    <img src='" . $row['atworkPatch'] . "'>
                    <div class='gridViewInfo'>
                    ". $row['title'] ."
                    </div>
            </div>";
        };
    ?>
</div>
<?php include('includes/footer.php'); ?>

