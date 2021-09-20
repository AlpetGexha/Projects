<?php include "include/header.php"; ?>
<?php
$postTitle = "";
$postBody = "";


$obj = new InsertData();

if (isset($_POST['postSubmit'])) {

    $Titulli = $_POST['postTitle'];
    $Body = $_POST['postBody'];
    $Tags = $_POST['postTags'];

    if ($obj->InsertData($Titulli, $Body, $Tags)) {
        header("Location: index.php");
    }
}

?>

<div class="container mt-5">
    <div class="row justify-content-md-center h-100">
        <div class="card-wrapper">
            <div class="card fat  bg-dark text-white">
                <div class="card-body">
                    <h4 class="card-title">Krijo Postime</h4>

                    <form method="POST" action="#">

                        <div class="form-group">
                            <label>Titulli</label>
                            <input id="p_titulli" type="text" class="form-control" placeholder="Titulli" name="postTitle" required="" value="<?= $postTitle ?>" oninvalid="this.setCustomValidity('Shkruani titullin');" oninput="this.setCustomValidity('');">
                        </div>

                        <label>P&euml;rshkrimi</label>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="P&euml;rshkrimi" id="floatingTextarea2 " style="height: auto;" name="postBody" required="" oninvalid="this.setCustomValidity('Shkruani P&euml;rshkrimin');" oninput="this.setCustomValidity('')"><?= $postBody ?></textarea>
                            <label for="floatingTextarea2">Pershkrimi</label>
                        </div>


                        <label>Tagat</label>
                        <div class="form-group">
                            <input type="text" class="form-control" autocomplete="off" name="postTags">
                        </div>

                        <div class="form-group m-0  mt-3 ">
                            <button type="submit" name="postSubmit" class="btn btn-primary btn-block">
                                Posto
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('input[name="postTags"]').amsifySuggestags({
        removeSpace: true,
        trimValue: true,
        lowercase: true,
        hashtag: true,
        removeSymbol: true,
    });
</script>

<?php include "include/footer.php"; ?>