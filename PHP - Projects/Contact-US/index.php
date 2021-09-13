<?php
include 'server.php';
// $msg = "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/style.css">
    <title>Kontakit</title>
</head>

<body>
    <form method="POST" action="#">
        <!-- Errori  -->
        <?php if (!empty($msg)) {
            echo $msg;
        } ?>

        <div class="container">
            <div class="contact_box_mesazhi">

                <div class="left_mesazhi"></div> <!-- Fotoja -->

                <div class="right_mesazhi">
                    <h2>Na Kontaktoni</h2>
                    <p style="color: red;">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                    <!--   Shtesë
                        <input type="text" class="inputat" placeholder="Emri" required="" name="contactEmri" >
                        <input type="email" class="inputat" placeholder="Email" required="" name="contactEmail" >
                        <input type="text" class="inputat" placeholder="Numri i telefonit" name="contactNumber">
                    -->

                    <textarea placeholder="Mesazhi..." class="inputat_mesazhi" id="mesazhi" required="" name="contactBody" rows="10" cols="60" oninvalid="this.setCustomValidity('Ju lutem shkruani mesazhi');" oninput="this.setCustomValidity('');"></textarea>
                    <input id="btn_mesazhi" class="btn_mesazhi" type="submit" name="contactSubmit" value="D&euml;rgoni">
                </div>

            </div>

        </div>

        <br>

    </form>
</body>

</html>