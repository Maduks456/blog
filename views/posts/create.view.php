<?php require "views/components/navbar.php"; ?>
    <?php ob_start();?>

        <h1>Izveidot bloga ierakstu</h1>
        <form method="POST">
            <label><input name="content" value="<?= $_POST['content'] ?? "" ?>" /></label>
            <?php if (isset($errors["content"])){?>
                <p><?= $errors["content"]?></p>
            <?php }?>
            <input type="submit">
        </form>
        <?php ?>
    <?php $content = ob_get_contents();?>
    <?php ob_end_clean();?>
<?php require "views/components/layout.php"; ?>