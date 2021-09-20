<?php

include "include/header.php";


$getID = $_GET['id'];

class BlogPost extends DB
{
    public function data($getID)
    {
        $sqla = "SELECT * FROM post WHERE postID = ? order by postID DESC ";
        $this->stmt = $this->openDB()->prepare($sqla);
        $this->stmt->execute([$getID]);
        $this->row = $this->stmt->fetch();
    }

    public function convert_clickable_links($value)
    {
        $msg = preg_replace(array('/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:\'".,<>?«»“”‘’]))/', '/(^|[^a-z0-9_])@([a-z0-9_]+)/i', '/(^|[^a-z0-9_])#([a-z0-9_]+)/i'), array('<a href="$1" target="_blank">$1</a>', '$1<a href="">@$2</a>', '$1<a href="index.php?hashtag=$2">#$2</a>'), $value);
        return $msg;
    }
}

$x = new BlogPost();
$x->data($getID);
$row = $x->row;


?>



<div class="container mt-5 m-auto">
    <div class="h-100 p-5 text-white text-center bg-dark rounded-3">
        <h2><?= $row['postTitle'] ?></h2>
        <p class="text-muted">U postua me <?= strftime('%e %B, %Y', strtotime($row['postTime'])) ?></p>
        <p><?= $row['postBody'] ?></p>
        <p><?= $x->convert_clickable_links($row['postTags']) ?></p>
    </div>


    <div class="d-flex bd-highlight mb-3">

        <?php
        $next = new NextPrevius("postID", $getID);
        $next->getPreviusPost();
        $next->getNextPost();
        ?>
    </div>
</div>

<?php include "include/footer.php"; ?>