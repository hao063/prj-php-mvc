<?php 
require '../../config.php';
$sql  = "SELECT * FROM categorys";
$result = db_fetch_array($sql);
$num  = 1;

?>
<?php foreach($result as $row): ?>
    <?php 
        $sql  = "SELECT * FROM products WHERE id_category = {$row['id']}";
        $total = db_num_row($sql);
    ?>
    <tr>
        <td class="text-center text-sm">
            <?= $num++; ?>
        </td>
        <td>
        <a href="?mod=admin&contrl=product&idCategory=<?= $row['id'] ?>" class="text-sm font-weight-bolder">
            <?= $row['name'] ?>
        </a>
        </td>
        <td class="text-center text-sm">
        <?= $total ?>
        </td>
        <td> 
            <div style="display: flex; justify-content: center;" class="btn-group d-flex flex-row-reverse bd-highlight">
                <a type="button" class=" text-secondary dropdown-toggle-split " data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-equals"></i>
                </a>
                <ul class="dropdown-menu m-0">
                    <li><button type="button" class="dropdown-item m-0 text-dark btn-get-id-edit-category" data-bs-toggle="modal" data-bs-target="#exampleModal<?=$row['id']?>edit" data-id="<?=$row['id']?>">Sửa</button></li>
                    <li><button type="button" class="dropdown-item m-0 text-dark btn-get-id-remove-category" data-bs-toggle="modal" data-bs-target="#exampleModal<?=$row['id']?>remove" >Xóa</button></li>
                </ul>
            </div>
            <!-- Xóa danh mục -->
            <div class="modal fade modal-remove-category" id="exampleModal<?=$row['id']?>remove" tabindex="-1" aria-labelledby="exampleModalLabel<?=$row['id']?>remove" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel<?=$row['id']?>remove">Bạn có chắc muốn xóa danh mục này?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <span class="text-danger">Lưu ý</span>: Sản phẩm của danh mục này cũng sẽ bị xóa theo.
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary btn-remove-category" data-id="<?=$row['id']?>">Xóa</button>
                    </div>
                </div>
                </div>
            </div>
            <!-- Sửa danh mục -->
            <div class="modal fade modal-edit-category" id="exampleModal<?=$row['id']?>edit" tabindex="-1" aria-labelledby="exampleModalLabel<?=$row['id']?>edit" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel<?=$row['id']?>edit">Sửa danh mục</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" class="form-cate">
                        <div class="modal-body">
                            <label class="col-sm-2 col-form-label">Tên:</label>
                            <input type="text" class="form-control border border-1 border-primary p-2 input-name-<?=$row['id']?>" value="<?=$row['name']?>" name="name">
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="button" class="btn btn-primary btn-edit-category" data-id="<?=$row['id']?>">Thay đổi</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </td>
    </tr>



    
<?php endforeach; ?>