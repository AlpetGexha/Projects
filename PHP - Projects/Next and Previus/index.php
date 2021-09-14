<?php
include 'database/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
    <title>Next Previus</title>
</head>

<body>

    <?php
    $sql = "SELECT * FROM nextprevius order by nextpreviusID ASC";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    ?>
    <div class="container mt-5">
        <?php foreach ($stmt as $row) : ?>
            <div class="h-100 p-5 mt-3 mb-3s text-white bg-dark rounded-3">
                <h2><?= $row['nextpreviusTitle'] ?></h2>
                <p><?= substr($row['nextpreviusBody'], 0, 100) . "..." ?></p>
                <a href="view.php?id=<?= $row['nextpreviusID'] ?>" class="btn btn-outline-light" type="button">Meso m&euml; shum&euml;</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>