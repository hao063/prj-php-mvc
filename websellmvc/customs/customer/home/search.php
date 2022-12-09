<?php
require '../../config.php';
$search =  $_GET['search'];
$sql = "SELECT * FROM products WHERE name_search like '%$search%' ORDER BY id DESC LIMIT 4";
$data = db_fetch_array($sql);
$row =  db_num_row($sql);

$sql_catpgory = "SELECT * FROM categorys WHERE name like '%$search%' ORDER BY id DESC LIMIT 4";
$data_catpgory = db_fetch_array($sql_catpgory);
$row_catpgory =  db_num_row($sql_catpgory);
?>

<?php if($row > 0): ?>
    <?php foreach($data as $item): ?>
        <a href="?ac=detail&idProduct=<?=$item['id']?>&search=on">
            <div class="item-writing">
                <div><button><img src="./public/customer/images/search.png" alt=""></button> </div>
                <div> <?= formatTextIndex(base64_decode($item['name']), 15); ?> </div>
            </div>
        </a>        
    <?php endforeach; ?>
<?php endif; ?> 

<?php if($row_catpgory > 0): ?>
    <?php foreach($data_catpgory as $item): ?>
        <a href="?contrl=category&ac=getCategory&idCategory=<?=$item['id']?>&search=on">
            <div class="item-writing">
                <div><button><img src="./public/customer/images/search.png" alt=""></button> </div>
                <div> <?= formatTextIndex($item['name'], 15); ?> </div>
            </div>
        </a>        
    <?php endforeach; ?>
<?php endif; ?> 