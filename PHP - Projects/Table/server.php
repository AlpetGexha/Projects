<?php
include 'config.php';
session_start();
ob_start();

setlocale(LC_TIME, array('da_DA.UTF-8', 'da_DA@euro', 'da_DA', 'Albanian'));

class Modal
{

    public function getModal($modalName, $modalID, $modalTilte, $modalBody, $btnColor, $btnText, $path = "server.php")
    {
?>
        <form action="<?= $path ?>" method="POST">
            <div class="modal fade" id="<?= $modalName . $modalID ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?= $modalTilte ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?= $modalBody ?>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mbylle</button>
                            <button type="submit" value="<?= $modalID ?>" name="<?= $modalName ?>" class="btn btn-<?= $btnColor ?>" autofocus=""><?= $btnText ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <?php

    }
}


class Pagination extends DB
{

    public function InsertData($table_id, $SELECT, $pageNumber = 25, $whereid = "")
    {
        $perPage = $pageNumber;



        $stmt = $this->openDB()->query('SELECT count(*) FROM ' . $table_id . " " . $whereid . '   ');
        $total_results = $stmt->fetchColumn();
        $this->total_pages = ceil($total_results / $perPage);


        $this->page = isset($_GET['faqja']) ? $_GET['faqja'] : 1;
        $starting_limit = ($this->page - 1) * $perPage;
        $this->previous_page = $this->page - 1;
        $this->next_page = $this->page + 1;


        $query = "" . $SELECT . " LIMIT $starting_limit,$perPage";


        $this->result = $this->openDB()->prepare($query);
        $this->result->execute();
    }

    public function getNavPages($ID = "")
    {
    ?>
        <hr>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4">
                    <li>
                        <p>Faqja <?= $this->page ?> nga <?= $this->total_pages ?></p>
                </div>
                <div class="col-xl-8 d-flex flex-row-reverse bd-highlight">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item <?php if ($this->page <= 1) {
                                                        echo 'disabled';
                                                    } ?>">
                                <a class="page-link" <?php if ($this->page > 1) {
                                                            echo "class='page-link' href='?faqja=" . $this->previous_page . $ID . "'";
                                                        } ?>>Prapa</a>
                            </li>
                            <?php for ($i = 1; $i <= $this->total_pages; $i++) :
                                if ($i == $this->page) {
                                    echo '                
                                    <li class="page-item active">
                                        <a class="page-link " href="?faqja=' . $i . $ID . '"> ' . $i . '</a>
                                        </li>';
                                } else {
                                    echo '                
                                    <li class="page-item">
                                        <a class="page-link " href="?faqja=' . $i . $ID . '"> ' . $i . '</a>
                                        </li>';
                                }
                            ?>
                            <?php endfor; ?>
                            <li class="page-item <?php if (($this->page + 1) >= $this->total_pages) {
                                                        echo ' disabled';
                                                    } ?>">
                                <a class="page-link" <?php if (($this->page + 1) < $this->total_pages) {
                                                            echo "href='?faqja=" . $this->next_page . $ID . "'";
                                                        } ?>>Tjetra</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
<?php
    }
}


class tableData extends DB
{

    public function InsertData($name, $surname, $email)
    {
        $sql = "INSERT into info(tableName,tableSurname,tableEmail) 
                    VALUE(?,?,?)";
        $stml = $this->openDB()->prepare($sql);
        $stml->execute([$name, $surname, $email]);
        return true;
    }

    public function deletSingleData($id)
    {
        $sql = "DELETE FROM info WHERE tableID = ?";
        $stml = $this->openDB()->prepare($sql);
        $stml->execute([$id]);
        return true;
    }

    public function deleteMultiData($deleteID)
    {
        if (isset($_POST['TableMultiDelete'])) {
            foreach ($_POST['TableMultiDelete'] as $deleteID) {
                $sql = "DELETE FROM info WHERE tableID = ?";
                $stml = $this->openDB()->prepare($sql);
                $stml->execute([$deleteID]);
            }
        }
    }

    public function updateData($id, $name, $surname, $email)
    {

        $sql = "UPDATE info SET tableName = ?, tableSurname = ?, tableEmail = ? WHERE tableID = ?";
        $stml = $this->openDB()->prepare($sql);
        $stml->execute([$name, $surname, $email, $id]);
        return true;
    }
}

$obj = new tableData();

if (isset($_POST['tableSubmit'])) {

    $name = $_POST['tableEmri'];
    $surname = $_POST['tableMbiemri'];
    $email = $_POST['tableEmail'];

    if ($obj->InsertData($name, $surname, $email)) {
        header("Location: index.php");
    }
}

if (isset($_POST['tableSingleDelete'])) {

    $id = $_POST['tableSingleDelete'];

    if ($obj->deletSingleData($id)) {
        header("Location: index.php");
    }
}

if (isset($_POST['tableMultiDeleteSubmit'])) {
    $id = $_POST['TableMultiDelete'];

    if ($obj->deleteMultiData($id)) {
        header("Location: index.php");
    }
}

if (isset($_POST['modalTableEdit'])) {

    $id = $_POST['modalTableEdit'];
    $name = $_POST['tableEmriEdit'];
    $surname = $_POST['tableMbiemriEdit'];
    $email = $_POST['tableEmailEdit'];

    $obj->updateData($id, $name, $surname, $email);
    header("Location: index.php");
}
