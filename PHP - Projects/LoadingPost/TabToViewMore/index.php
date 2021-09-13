<?php include 'server.php'; 
ob_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.0/jquery.min.js" integrity="sha512-K7Zj7PGsHk2fpY3Jwvbuo9nKc541MofFrrLaUUO9zqghnJxbZ3Zn35W/ZeXvbT2RtSujxGbw8PgkqpoZXXbGhw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script src="main.js"></script>
    
    <title>Loading With Button</title>
</head>
<div class="container mt-5">
    <form action="#" method="POST">
        <div class="form-group">
            <label>Titulli</label>
            <input id="postTitle" type="text" class="form-control" placeholder="Titulli" name="postTitle" required="" oninvalid="this.setCustomValidity('Shkruani titullin');" oninput="this.setCustomValidity('');">
        </div>

        <label>P&euml;rshkrimi</label>
        <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="P&euml;rshkrimi" id="floatingTextarea2" style="height: auto;" name="postBody" required="" oninvalid="this.setCustomValidity('Shkruani P&euml;rshkrimin');" oninput="this.setCustomValidity('')"></textarea>
            <label for="floatingTextarea2">Pershkrimi</label>
        </div>

        <button type="submit" class="btn btn-primary" name="postSubmit">Posto</button>

    </form>
    

    <?php

    $rowperpage = 3;


    $sql = "SELECT count(*) as allcount FROM post";
    $stml = $db->prepare($sql);
    $stml->execute();
    $row = $stml->fetch(PDO::FETCH_ASSOC);
    $allcount = $row['allcount'];


    $sql2 = "SELECT * FROM post order by postID ASC LIMIT 0, $rowperpage ";
    $result = $db->prepare($sql2);
    $result->execute();

    ?>
    <?php foreach ($result as $row) : ?>
        <div class="post" id="post_<?= $row['postID'] ?>">
            <div class="h-100 p-3 mt-3 mb-2 bg-light border rounded-3">
                <h1><?= $row['postTitle'] ?></h1>
                <p><?= $row['postBody'] ?></p>
                <button class="btn btn-outline-secondary" type="button">Shiko me shume</button>
                <p class="text-muted mt-2"><?= strftime('%e %B, %Y', strtotime($row['postTime'])); ?></p>
            </div>
        </div>
    <?php endforeach; ?>


    <button class="load-more btn btn-info">Shiko m&euml; shum&euml;</button>
    <input type="hidden" id="row" value="0">
    <input type="hidden" id="all" value="<?= $allcount; ?>">



</div>

<body>

</body>

</html>