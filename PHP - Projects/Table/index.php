<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

    <title>PHP PDO TABLE</title>
</head>

<body>

    <?php

    include "server.php";
    ob_start();

    $x = new Pagination();
    $sql = "SELECT * from info ORDER BY tableID DESC";
    $x->InsertData("info", "$sql", 30);

    $data = new tableData();
    $modal = new Modal();

    ?>

    <div class="container mt-5">
        <h3 class="title">Informacioni</h3>

        <form action="#" method="POST">

            <div class="row">
                <div class="col">
                    <div class="form-group mb-3">
                        <label for="Emri">Emri</label>
                        <input type="text" class="form-control" placeholder="Emri" name="tableEmri" required="" autofocus="" oninvalid="this.setCustomValidity('Shkruani emrin');" oninput="this.setCustomValidity('')">
                    </div>
                </div>


                <div class="col">
                    <div class="form-group mb-3">
                        <label for="Mbiemri">Mbiemri</label>
                        <input type="text" class="form-control" placeholder="Mbiemri" name="tableMbiemri" required="" oninvalid="this.setCustomValidity('Shkruani mbiemrin');" oninput="this.setCustomValidity('')">
                    </div>
                </div>
            </div>


            <div class="form-group mb-3">
                <label for="Email">Email</label>
                <input type="email" class="form-control" placeholder="Email" name="tableEmail" required="" oninvalid="this.setCustomValidity('Shkruani emailin');" oninput="this.setCustomValidity('')">
            </div>

            <div class="form-group m-0 mb-4">
                <button type="submit" name="tableSubmit" class="btn btn-primary btn-block">
                    Shto
                </button>
            </div>

        </form>

        <form action="#" method="POST">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"> <input type="checkbox" name="select-all" id="select-all" /></th>
                            <th scope="col">Emri</th>
                            <th scope="col">Mbiemri</th>
                            <th scope="col">Email</th>
                            <th scope="col">Koha</th>
                            <th scope="col">Opsionet</th>
                        </tr>
                    <tbody>

                        <?php

                        foreach ($x->result as $key => $row) : ?>
                            <tr>
                                <td><input type='checkbox' name='TableMultiDelete[]' value='<?= $row['tableID'] ?>'></td>

                                <td><?= $row['tableName']; ?></td>
                                <td><?= $row['tableSurname']; ?></td>
                                <td><?= $row['tableEmail']; ?></td>
                                <td><?= strftime('%e %B, %Y', strtotime($row['tableTime'])); ?></td>
                                <td>
                                    <button class="btn btn-danger btn-sm" type="submit" name="tableSingleDelete" value="<?= $row['tableID'] ?>">
                                        Fshije
                                    </button>

                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalTableEdit<?= $row['tableID'] ?>">
                                        Ndrysho
                                    </button>

                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalTableView<?= $row['tableID'] ?>">
                                        Shiko
                                    </button>

                                </td>
                            </tr>
                            <?= $modal->getModal(
                                'modalTableView',
                                $row['tableID'],
                                'Shiko',
                                '<div class="container">
                                    <b>Emri</b>: ' . $row['tableName'] . '<br>
                                    <b>Mbiemri</b>: ' . $row['tableSurname'] . '<br>
                                    <b>Email</b>: ' . $row['tableEmail'] . '<br>
                                </div>
                                ',
                                'info',
                                '*'
                            );
                            $modal->getModal(
                                'modalTableEdit',
                                $row['tableID'],
                                'Ndrysho',
                                '
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group mb-3">
                                                <label for="Emri">Emri</label>
                                                <input type="text" class="form-control" value="' . $row['tableName'] . '" placeholder="Emri" name="tableEmriEdit" required=""  autofocus=""  >
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group mb-3">
                                                <label for="Mbiemri">Mbiemri</label>
                                                <input type="text" class="form-control" name="tableMbiemriEdit" value="' . $row['tableSurname'] . '" placeholder="Mbiemri"  required="" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="Email">Email</label>
                                        <input type="email" class="form-control" placeholder="Email"  value="' . $row['tableEmail'] . '" name="tableEmailEdit" required="">
                                    </div>

                                </div>',
                                'primary',
                                'Ndrysho',
                            );

                            ?>
                        <?php endforeach; ?>
                    </tbody>
                    </thead>
                </table>
                <div class="d-flex flex-nowrap">
                    <img src="imgup.png" alt="Shiqeta">
                    <input class="btn btn-danger btn-sm" type='submit' value='Delete' name='tableMultiDeleteSubmit' id="delete-btn">
                </div>
            </div>
        </form>
        <?php if ($x->total_pages == 0) {
            print '<p class="text-center" style="color: red;">Nuk ka rezultat</p>';
        } else {
            $x->getNavPages();
        }
        ?>
    </div>

    <script>
        $('#select-all').click(function(event) {
            if (this.checked) {
                $(':checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;
                });
            }
        });
    </script>

</body>

</html>