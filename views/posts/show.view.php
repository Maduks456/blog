
<?php require "views/components/navbar.php"; ?>
    <?php ob_start();?>
        <h1 class="main_title"><?= htmlspecialchars($post["content"])?></h1>
        <div class="small_line"></div>
        <h2 class="main_text"> Kategorija: <?= $post["category_name"] ?></h2>
        <div class="main_sigh">
            <div>
                <a href = "edit?id=<?= $post["id"]?>">
                    <button>
                        Rediģēt
                    </button>
                </a>
            </div>
            <div>
                <form method="POST" action="/delete">
                    <input name="id" value = <?= $post["id"]?> type="hidden">
                    <button type="submit">Dzēst</button>
                </form>
            </div>
        </div>
        <div class="small_line"></div>
        <div>
            <form method="POST" action="kom-create">
                <input name="id" value = <?= $post["id"]?> type="hidden">
                <label  class="main_text" >Autors:</label>
                <input type="text" name="auther">
                <label  class="main_text" >Komentārs:</label>
                <input type="text" name="saturs">
                <button>
                    Komentēt
                </button>
            </form>
        </div>
        <div>
            <h2 class="main_text">Komentāri</h2>
        </div>
        <div class="small_line"></div>
        <div class="kom">
            <?php if(isset($comment)){ ?>
                <?php foreach ($comment as $com) { ?>
                    <div class="kom_table">
                        <div class="kom_table_row">
                            <div>
                               <b><?= $com["author"] ?></b>
                            </div>
                            <div>
                                <?= $com["creation_time"] ?>
                            </div>
                            <div>
                                <a href = "kom-edit?id=<?= $com["kom_id"]?>">
                                    <button>
                                        Rediģet
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="kom_table_row">
                            <div>
                                 <?= $com["kom_content"] ?>
                            </div>
                            <div>
                                <form method= "POST" action="kom-delete">
                                    <input name="id" value = <?= $post["id"]?> type="hidden">
                                    <input name="kom_id" value = <?= $com["kom_id"]?> type="hidden">
                                    <button>
                                        Dzēst
                                    </button>   
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
        
    <?php $content = ob_get_contents();?>
    <?php ob_end_clean();?>
<?php require "views/components/layout.php"; ?>