<?php
include 'database/config.php';
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">

    <title>Document</title>
</head>

<body>
    <?php
    $sql = "SELECT * FROM nextprevius WHERE nextpreviusID = ? order by nextpreviusID DESC ";
    $stmt = $db->prepare($sql);
    $stmt->execute([$id]);
    $row = $stmt->fetch();

    ?>


    <div class="container mt-5 m-auto">
        <div class="h-100 p-5 text-white text-center bg-dark rounded-3">
            <h2><?= $row['nextpreviusTitle'] ?></h2>
            <p class="text-muted">U postua me <?= strftime('%e %B, %Y', strtotime($row['nextpreviusTime'])) ?></p>
            <p><?= $row['nextpreviusBody'] ?></p>
        </div>
        <div class="d-flex bd-highlight mb-3">
            <!-- Previus -->
            <div class="me-auto p-2 bd-highlight">
                <?php
                //next Previus
                $Previoussql = "SELECT * FROM nextprevius WHERE nextpreviusID < ? order by nextpreviusID DESC";
                $Previousstml = $db->prepare($Previoussql);
                $Previousstml->execute([$id]);

                ?>
                <?php if ($Previousrow = $Previousstml->fetch(PDO::FETCH_BOTH)) : ?>
                    <a href="view.php?id=<?= $Previousrow['nextpreviusID'] ?>">
                        <button type="button" class="btn btn-secondary">
                           < Previus
                        </button>
                    </a>
                <?php endif; ?>
            </div>


            <!-- Next -->
            <div class="p-2 bd-highlight">
                <?php
                //next button
                $Nextsql = "SELECT * FROM nextprevius WHERE nextpreviusID > ? order by nextpreviusID ASC";
                $Nextstml = $db->prepare($Nextsql);
                $Nextstml->execute([$id]);
                ?>
                <?php if ($Nextrow = $Nextstml->fetch(PDO::FETCH_BOTH)) : ?>
                    <a href="view.php?id=<?= $Nextrow['nextpreviusID']; ?>">
                        <button type="button" class="btn btn-secondary ">
                            Next >
                        </button>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>

</html>