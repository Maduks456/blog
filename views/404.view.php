<?php require __DIR__ . '/components/navbar.php'; ?>
<?php ob_start();?>
<p>You went to the wrong address, above this text there are links to the correct addresses </p>
<?php $content = ob_get_contents();?>
<?php ob_end_clean();?>
<?php require __DIR__ . '/components/layout.php'; ?>