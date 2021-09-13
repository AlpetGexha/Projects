<?php
include 'server.php';

$x = new Pagination();
$sql = "SELECT * from post ORDER BY postID DESC";
$x->InsertData("post", "$sql", 5);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

    <title>Pagination</title>
</head>

<body>


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

        <?php foreach ($x->result as $row) : ?>
            <div class="h-100 p-3 mt-3 mb-2 bg-light border rounded-3">
                <h1><?= $row['postTitle'] ?></h1>
                <p><?= $row['postBody'] ?></p>
                <button class="btn btn-outline-secondary" type="button">Shiko me shume</button>
                <p class="text-muted mt-2"><?= strftime('%e %B, %Y', strtotime($row['postTime'])); ?></p>
            </div>
        <?php endforeach; ?>

        <?php if ($x->total_pages == 0) {
            print '<p class="text-center" style="color: red;">Nuk ka rezultat</p>';
        } else {
            $x->getNavPages();
        }
        ?>
    </div>


</body>

</html>