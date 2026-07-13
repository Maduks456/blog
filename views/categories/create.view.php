<?php require __DIR__ . '/../components/navbar.php'; ?>
    <?php ob_start();?>
        <h1 class="main_title">Create A Category</h1>
        <div class="small_line"></div>
        <div>
            <form method="POST">
                <label>
                    Category name:
                    <input name="category_name" value="<?= $_POST['category_name'] ?? "" ?>" />
                </label>
                <button>Create</button>
            </form>
        </div>
        <div>
            <?php if (isset($errors["category_name"])){?>
                <p><?= $errors["category_name"]?></p>
            <?php }?>
        </div>
    <?php $content = ob_get_contents();?>
    <?php ob_end_clean();?>
<?php require __DIR__ . '/../components/layout.php'; ?>