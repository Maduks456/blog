
<?php require __DIR__ . '/../components/navbar.php'; ?>
    <?php ob_start();?>
                <div class="kom">
                    <div class="kom_table">
                         <form form method= "POST">
                                <input name="id" value = <?= $comment["post_id"]?> type="hidden">
                                <input name="kom_id" value = <?= $comment["id"]?> type="hidden">
                        <div class="kom_table_row">
                            
                            <div>
                               <input name="author" value="<?= $_POST['author'] ??  $comment["author"] ?>" />
                            </div>
                            <div>
                                <?= $comment["creation_time"] ?>
                            </div>
                            <div>
                                <button>
                                    Save changes
                                </button>
                            </div>
                        </div>
                        <div class="kom_table_row">
                            <div>
                                 <input name="content" value="<?= $_POST['content'] ??  $comment["content"] ?>" />
                            </div>
                            </form>
                            <div>
                                <form method= "POST" action="kom-delete">
                                    <input name="id" value = <?= $comment["post_id"]?> type="hidden">
                                    <input name="kom_id" value = <?= $comment["id"]?> type="hidden">
                                    <button>
                                        Delete
                                    </button>   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                    
        
    <?php $content = ob_get_contents();?>
    <?php ob_end_clean();?>
<?php require __DIR__ . '/../components/layout.php'; ?>