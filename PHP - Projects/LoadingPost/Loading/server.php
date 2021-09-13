<?php
include 'config.php';
setlocale(LC_TIME, array('da_DA.UTF-8', 'da_DA@euro', 'da_DA', 'Albanian'));

if (isset($_POST['postSubmit'])) {

    $title = $_POST['postTitle'];
    $body = $_POST['postBody'];

    $sql = "INSERT into post(postTitle,postBody) 
                     VALUE(?,?)";
    $stml = $db->prepare($sql);
    $stml->execute([$title, $body]);
    if ($stml) {
        header("Location: index.php");
    } else {
        echo "Error";
    }
}



if (isset($_POST["limit"], $_POST["start"])) {

    $sql = "SELECT * FROM post ORDER BY postID DESC LIMIT " . $_POST["start"] . ", " . $_POST["limit"] . "";
    $result = $db->query($sql);
    foreach ($result as $row) {
        echo '
        <div class="h-100 p-3 mt-3 mb-2 bg-light border rounded-3">
            <h1>' . $row["postTitle"] . ' </h1>
            <p> ' . $row["postBody"] . '</p>
            <button class="btn btn-outline-secondary" type="button">Shiko me shume</button>
            <p class="text-muted mt-2">' . strftime('%e %B, %Y', strtotime($row['postTime'])) . '</p>
        </div>
        ';
    }
}
