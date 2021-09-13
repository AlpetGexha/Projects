<?php
include 'server.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>ToDo List</title>

</head>

<body>

    <body>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

        <div class="container mt-5">
            <form action="#" method="POST">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Shrunai List&euml;n" aria-label="Shrunai List&euml;n" aria-describedby="button-addon2" name="todoItem" required="" autofocus="" oninvalid="this.setCustomValidity('Shkruani Itemin');" oninput="this.setCustomValidity('');">
                    <button class="btn btn-outline-primary" type="submit" id="button-addon2" name="todoButton">Shto</button>
                </div>
                <?php
                $sql = "SELECT * FROM todo order by todoID DESC";
                $stml = $db->prepare($sql);
                $stml->execute();
                $result = $stml->fetchAll();

                foreach ($result as $row) :
                ?>
            </form>
            <div class="h-100 p-2 text-white rounded-3 mt-2" style="background-color: #343a40;">
                <div class="row">
                    <div class="col-sm-11">
                        <h2><?= $row['todoItem']; ?></h2>
                    </div>
                    <div class="col-sm-1">
                        <form action="#" method="POST">
                            <div class="col-lg-2 d-flex flex-row-reverse bd-highlight m-auto">

                                <button type="submit" class="btn me-3 btn-outline-danger" name="todoDelete" value="<?= $row['todoID']; ?>">
                                    Fshije
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <p class="text-muted"> <?=  "U postua  " . TimeAgo(($row['todoTime']), date("Y-m-d H:i:s")); ?> </p>

        <?php endforeach; ?>

        </div>

    </body>

</html>