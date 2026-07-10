
<?php require __DIR__ . '/../components/navbar.php'; ?>
    <?php ob_start();?>
        <h1 class="main_title"><?= htmlspecialchars($post["content"])?></h1>
        <div class="small_line"></div>
        <h2 class="main_text"> Category: <?= $post["category_name"] ?></h2>
        <div class="main_sigh">
            <div>  
               <a href = "edit?id=<?= $post["id"]?>">
                    <button>
                        Edit
                    </button>
                </a>
            </div>
            <div>
                <form method="POST" action="/delete">
                    <input name="id" value = <?= $post["id"]?> type="hidden">
                    <button type="submit">Delete</button>
                </form>
            </div>
        </div>
        <div class="small_line"></div>
        <div>
            <form method="POST" action="kom-create">
                <input name="id" value = <?= $post["id"]?> type="hidden">
                <label  class="main_text" >Author:</label>
                <input type="text" name="auther">
                <label  class="main_text" >Comment:</label>
                <input type="text" name="saturs">
                <button>
                    Send Comment
                </button>
            </form>
        </div>
        <div>
            <h2 class="main_text">Comments</h2>
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
                                        Edit Comment
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
                                        Delete Comment
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
<?php require __DIR__ . '/../components/layout.php'; ?>