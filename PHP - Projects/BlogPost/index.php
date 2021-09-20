<?php
include "include/header.php";

$x = new Post();

?>

<div class="container mt-5">


    <?php
    if (isset($_GET['postSerch'])) {
        $search = $_GET['postSerch'];
        $sql = "SELECT * from post WHERE postTitle LIKE '%$search%' ORDER BY postID DESC";
        $x->getAllPost($sql, " WHERE postTitle LIKE '%$search%'");
    } elseif (isset($_GET["hashtag"])) {
        $hashtag = $_GET['hashtag'];
        $sql = "SELECT * from post WHERE postTags LIKE '%$hashtag%' ORDER BY postID DESC";
        $x->getAllPost($sql, " WHERE postTags LIKE '%$hashtag%'");
    } else {
        $sql = "SELECT * from post ORDER BY postID DESC";
        $x->getAllPost($sql);
    }

    ?>

</div>
</div>




<?php include "include/footer.php"; ?>