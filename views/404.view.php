<?php require "components/navbar.php"; ?>
<?php ob_start();?>
<p> Tu aizgāji uz nepareizo adresi virs šī teksta ir linki uz pareizām adresēm </p>
<?php $content = ob_get_contents();?>
<?php ob_end_clean();?>
<?php require "components/layout.php"; ?>