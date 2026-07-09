<?php require __DIR__ . '/../components/navbar.php'; ?>
<?php ob_start();?>
    <h1 class="main_title">Emuārs</h1>
        <div class="small_line"></div>
            <div>
                <form>
                    <input name='search_query' value='<?= $_GET["search_query"] ?? "" ?>'/>  
                    <button>Meklēt</button>
                </form>
            </div>
            <div class="small_line"></div>
            <div>
                <?php if (count($posts) == 0) { ?>
                <p>❌ Nav atrasts neviens ieraksts. 😭 Lūdzu, pamēģini citu vārdu vai frāzi 🐣</p>
                <?php } else { ?>
                <div class="main_table">
                <?php foreach($posts as $post) { ?>
                <div class="main_table_cell">
                    <a href = "show?id=<?= $post["id"]?>"> 
                    <button>
                    <?= htmlspecialchars($post["content"]) ?> 
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