<?php require __DIR__ . '/../components/navbar.php'; ?>
<?php ob_start();?>
    <h1 class="main_title">Blog</h1>
        <div class="small_line"></div>
            <div>
                <form>
                    <input name='search_query' value='<?= $_GET["search_query"] ?? "" ?>'/>  
                    <button>Search</button>
                </form>
            </div>
            <div class="small_line"></div>
            <div>
                <?php if (count($posts) == 0) { ?>
                <p>❌ No records found. 😭 Please try another word or phrase. </p>
                <?php } else { ?>
                <div class="main_table">
                <?php foreach($posts as $post) { ?>
                <div class="main_table_cell">
                    <a href = "show?id=<?= $post["id"]?>"> 
                    <button>
                    <?= htmlspecialchars($post["title"]) ?> 
                    </button>
                    </a>
                </div>
                <?php } ?>
                </div>
                <?php } ?>
        </div>
<?php $content = ob_get_contents();?>
<?php ob_end_clean();?>
<?php require __DIR__ . '/../components/layout.php'; ?>