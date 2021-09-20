<?php


class Post
{
    public function getAllPost($sql, $mavwherid = "", $navid = "")
    {
        $PostLimit = 5;
        $x = new Pagination();
        // $sql = "SELECT * from post ORDER BY postID DESC";
        $x->InsertData("post", "$sql", $PostLimit, $mavwherid);

?>
        <?php foreach ($x->result as $row) : ?>
            <div class="h-100 p-3 mt-3 mb-2 text-white bg-dark border rounded-3">
                <h1><?= $row['postTitle'] ?></h1>
                <p><?= substr($row['postBody'], 0, 300) . "..." ?></p>
                <a href="view.php?id=<?= $row['postID'] ?>" class="btn btn-outline-light" type="button">Meso m&euml; shum&euml;</a>
                <p class="text-muted mt-2"><?= strftime('%e %B, %Y', strtotime($row['postTime'])); ?></p>
            </div>
        <?php endforeach; ?>

        <?php if ($x->total_pages == 0) {
            print '<p class="text-center" style="color: red;">Nuk ka rezultat</p>';
        } else {
            $x->getNavPages($navid);
        }
        ?><?php
        }
    }
