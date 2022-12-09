<?php 
require '../../config.php';
$id_province = $_GET['id'];

$sql = "SELECT * FROM district WHERE _province_id = $id_province";
$data = db_query($sql);

?>

<?php foreach($data as $row): ?>
    <option  value="<?= $row['id'] ?>"><?= $row['_name'] ?></option>
<?php endforeach; ?>