<?php


class NextPrevius extends DB
{
    protected  $id;
    public $getID;
    public function __construct($id, $getID)
    {
        $this->id = $id;
        $this->getID = $getID;
    }
    public function getPreviusPost()
    {
?>

        <!-- Previus -->
        <div class="me-auto p-2 bd-highlight">
            <?php
            // Previus
            $sql = "SELECT * FROM post WHERE $this->id < ? order by $this->id DESC";
            $Previousstml = $this->openDB()->prepare($sql);
            $Previousstml->execute(['' . $this->getID . '']);

            ?>
            <?php if ($Previousrow = $Previousstml->fetch(PDO::FETCH_BOTH)) : ?>
                <a href="view.php?id=<?= $Previousrow['' . $this->id . ''] ?>">
                    <button type="button" class="btn btn-secondary">
                        < Previus </button>
                </a>
            <?php endif; ?>
        </div>
        <!-- EndPrevius -->
    <?php
    }
    public function getNextPost()
    {
    ?>
        <!-- Next -->
        <div class="p-2 bd-highlight">
            <?php
            //next button
            $sqln = "SELECT * FROM post WHERE $this->id > ? order by $this->id ASC";
            $Nextstml = $this->openDB()->prepare($sqln);
            $Nextstml->execute(['' . $this->getID . '']);
            ?>
            <?php if ($Nextrow = $Nextstml->fetch(PDO::FETCH_BOTH)) : ?>
                <a href="view.php?id=<?= $Nextrow['' . $this->id . ''] ?>">
                    <button type="button" class="btn btn-secondary ">
                        Next >
                    </button>
                </a>
            <?php endif; ?>
        </div>
        <!-- EndNext -->
<?php
    }
}
?>