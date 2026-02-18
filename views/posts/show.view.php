
<?php require "views/components/navbar.php"; ?>
    <?php ob_start();?>
        <h1><?= htmlspecialchars($post["content"])?></h1>
        <a href = "edit?id=<?= $post["id"]?>"> Rediģēt</a>
        <form method="POST" action="/delete">
            <input name="id" value = <?= $post["id"]?> type="hidden">
            <button type="submit">Dzēst</button>
        </form>
    <?php $content = ob_get_contents();?>
    <?php ob_end_clean();?>
<?php require "views/components/layout.php"; ?>