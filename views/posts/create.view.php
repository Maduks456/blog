<?php require __DIR__ . '/../components/navbar.php'; ?>
    <?php ob_start();?>
        <h1 class="main_title">Create Blog Post</h1>
        <div class="small_line"></div>
        <div>
            <form method="POST">
            <label>
                <input name="content" value="<?= $_POST['content'] ?? "" ?>" />
            </label>
            <select name="category_id" >
                <option >-Choose A Category-</option>
                <?php foreach ($categories as $category) { ?>
                    <option value="<?= $category["id"] ?>"<?= $category["id"]==$CategoryNow? "selected" : " "?>> <?= $category["category_name"]?> </option>
                <?php } ?>
            </select>
        </div>
        <div>
            <button>
                Create
            </button>
        </div>
        <div>
            <?php if (isset($errors["content"])){?>
                <p><?= $errors["content"]?></p>
            <?php }?>
            </form>
        </div>
    <?php $content = ob_get_contents();?>
    <?php ob_end_clean();?>
<?php require __DIR__ . '/../components/layout.php'; ?>