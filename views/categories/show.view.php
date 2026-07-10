
<?php require __DIR__ . '/../components/navbar.php'; ?>
    <?php ob_start();?>
        <div>
            <h1 class="main_title"><?= htmlspecialchars($category["category_name"])?></h1>
        </div>
        <div class="small_line"></div>
        <div class="main_sigh">
            <div>
                <a href = "cat-edit?id=<?= $category["id"]?>">
                    <button>
                        Edit
                    </button> 
                </a>
            </div>
            <div>
                 <form method="POST" action="/cat-delete">
                    <input name="id" value = <?= $category["id"]?> type="hidden">
                    <button type="submit">Delete</button>
                </form>
            </div>
        </div>
    <?php $content = ob_get_contents();?>
    <?php ob_end_clean();?>
<?php require __DIR__ . '/../components/layout.php'; ?>