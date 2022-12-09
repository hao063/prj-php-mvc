<?php
    require '../../config.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM ward WHERE _district_id  = $id";
    $data = db_fetch_array($sql);
?>

<?php foreach ($data as $row): ?>
    <option  value="<?= $row['id'] ?>"><?= $row['_name'] ?></option>
<?php endforeach; ?>