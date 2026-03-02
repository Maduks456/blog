<?php require "views/components/navbar.php"; ?>
    <?php ob_start();?>
        <h1 class="main_title">Izveidot Kategoriju ierakstu</h1>
        <div class="small_line"></div>
        <div>
            <form method="POST">
                <label><input name="category_name" value="<?= $_POST['category_name'] ?? "" ?>" /></label>
                <button>Izveidot</button>
            </form>
        </div>
        <div>
            <?php if (isset($errors["category_name"])){?>
                <p><?= $errors["category_name"]?></p>
            <?php }?>
        </div>
    <?php $content = ob_get_contents();?>
    <?php ob_end_clean();?>
<?php require "views/components/layout.php"; ?>