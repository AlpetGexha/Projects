<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Loading</title>
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

        <div id="mainPostLoad"></div>
        <div id="mainPostLoadIMG"></div>

    </div>

    <script>
        $(document).ready(function() {

            var limit = 5;
            var start = 0;
            var action = 'inactive';

            function load_country_data(limit, start) {
                $.ajax({
                    url: "server.php",
                    method: "POST",
                    data: {
                        limit: limit,
                        start: start
                    },
                    cache: false,
                    success: function(data) {
                        $('#mainPostLoad').append(data);
                        if (data == '') {
                            $('#mainPostLoadIMG').html("<p class='text-center' style='color:red;'>Nuk ka m&euml; postime. </p>");
                            action = 'active';
                        } else {
                            $('#mainPostLoadIMG').html("<img style='width:100%; height:20px;' src='loading.gif'><img>");
                            action = "inactive";
                        }
                    }
                });
            }

            if (action == 'inactive') {
                action = 'active';
                load_country_data(limit, start);
            }
            $(window).scroll(function() {
                if ($(window).scrollTop() + $(window).height() > $("#mainPostLoad").height() && action == 'inactive') {
                    action = 'active';
                    start = start + limit;
                    setTimeout(function() {
                        load_country_data(limit, start);
                    }, 800);
                }
            });

        });
    </script>
</body>

</html>