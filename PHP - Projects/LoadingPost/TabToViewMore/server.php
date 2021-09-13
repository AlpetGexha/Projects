<?php
include 'config.php';
session_start();
ob_start();

$rowperpage = 3;  
$row = $_SESSION['row'];

$sql2 = 'SELECT * FROM post limit ' . $row . ',' . $rowperpage;
$result = $db->prepare($sql2);
$result->execute();
$rows = $result->fetchAll();

$html = '';
foreach ($result as $rows) {
    $html .= '
    <div class="post" id="post_' . $rows['postID'] . '">
        <div class="h-100 p-3 mt-3 mb-2 bg-light border rounded-3">
            <h1>' . $rows["postTitle"] . ' </h1>
            <p> ' . $rows["postBody"] . '</p>
            <button class="btn btn-outline-secondary" type="button">Shiko me shume</button>
            <p class="text-muted mt-2">' . strftime('%e %B, %Y', strtotime($rows['postTime'])) . '</p>
        </div>
    </div>
        ';
}

echo $html;