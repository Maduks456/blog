
<?php require "components/navbar.php"; ?>
<?php ob_start();?>
    <h1>Kategorijas</h1>
    <form>
        <input name='search_query' value='<?= $_GET["search_query"] ?? "" ?>'/> 
        <button>Meklēt</button>
    </form>
  <?php if (count($categories) == 0) { ?>
        <p>❌ Nav atrasts neviens ieraksts. 😭 Lūdzu, pamēģini citu vārdu vai frāzi 🐣</p>
    <?php } else { ?>
    <ul>
    <?php foreach($categories as $category) { ?>
        <li> <?= $category["category_name"] ?> </li>
    <?php } ?>
    </ul>
    <?php } ?>
<?php $content = ob_get_contents();?>
<?php ob_end_clean();?>
<?php require "components/layout.php"; ?>