<?php
include 'config.php';
setlocale(LC_TIME, array('da_DA.UTF-8', 'da_DA@euro', 'da_DA', 'Albanian'));
//**************** Pagination ****************//

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
                    <li> <p>Faqja <?= $this->page ?> nga <?= $this->total_pages ?></p>
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

    public function InsertData($title, $body)
    {
        $sql = "INSERT into post(postTitle,postBody) 
                    VALUE(?,?)";
        $stml = $this->openDB()->prepare($sql);
        $stml->execute([$title, $body]);
        return true;
    }
}

$obj = new tableData();

if (isset($_POST['postSubmit'])) {

    $title = $_POST['postTitle'];
    $body = $_POST['postBody'];

    if ($obj->InsertData($title, $body)) {
        header("Location: index.php");
    }
}
