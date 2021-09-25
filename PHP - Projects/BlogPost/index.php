<?php
include "include/header.php";

$x = new Post();

?>

<div class="container mt-5">


    <div class="dropdown">
        <button class="btn btn-success">Filter</button>
        <div class="dropdown-content">
            <a href="?ViewCountHigh" name="ViewCountHigh">ViewCountHigh</a>
            <a href="?ViewCountLow" name="ViewCountLow">ViewCountLow</a>
            <a href="?OlderPost" name="OlderPost">OlderPost</a>
            <a href="?NewPost" name="NewPost">NewPost</a>
            <a href="?Random" name="Random">Random</a>
        </div>
    </div>
    <?php
    if (isset($_GET['postSerch'])) {
        $search = $_GET['postSerch'];
        $sql = "SELECT * from post WHERE postTitle LIKE '%$search%' ORDER BY postID DESC";
        $x->getAllPost($sql, " WHERE postTitle LIKE '%$search%'");
    } elseif (isset($_GET["hashtag"])) {
        $hashtag = $_GET['hashtag'];
        $sql = "SELECT * from post WHERE postTags LIKE '%$hashtag%' ORDER BY postID DESC";
        $x->getAllPost($sql, " WHERE postTags LIKE '%$hashtag%'");
    } elseif (isset($_GET["ViewCountHigh"])) {
        $PostMadho = $_GET['ViewCountHigh'];
        $sql = "SELECT * from post ORDER BY postViews DESC ";
        $x->getAllPost($sql);
    } elseif (isset($_GET["ViewCountLow"])) {
        $PostMadho = $_GET['ViewCountLow'];
        $sql = "SELECT * from post ORDER BY postViews ASC ";
        $x->getAllPost($sql);
    } elseif (isset($_GET["OlderPost"])) {
        $PostMadho = $_GET['OlderPost'];
        $sql = "SELECT * from post ORDER BY postID ASC";
        $x->getAllPost($sql);
    } elseif (isset($_GET["NewPost"])) {
        $PostMadho = $_GET['NewPost'];
        $sql = "SELECT * from post ORDER BY postID DESC";
        $x->getAllPost($sql);
    } elseif (isset($_GET["Random"])) {
        $PostMadho = $_GET['Random'];
        $sql = "SELECT * from post ORDER BY RAND()";
        $x->getAllPost($sql);
    } else {
        $sql = "SELECT * from post ORDER BY postID DESC";
        $x->getAllPost($sql);
    }

    ?>

</div>
</div>




<?php include "include/footer.php"; ?>