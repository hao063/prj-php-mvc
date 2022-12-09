<?php 
require '../../config.php';
$idProduct = $_GET['idProduct'];
$sql = "SELECT * FROM images_product WHERE id_product = '$idProduct'";
$result = db_fetch_array($sql);
?>

<?php foreach($result as $img): ?>
    <div class="col-lg-3 col-md-12 mb-4">
        <img src="./data/upload/<?=$img['name_img']?>.<?=$img['type_img']?>" class="img-thumbnail">
        <div class="btn-group d-flex flex-row-reverse bd-highlight">
            <a type="button" class=" text-secondary dropdown-toggle-split " data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fas fa-equals"></i>
            </a>
            <ul class="dropdown-menu m-0">
                <li><button type="button" class="dropdown-item m-0 text-dark" data-bs-toggle="modal"
                        data-bs-target="#exampleModalDelImg<?=$img['id']?>" >Xóa</button></li>
            </ul>
        </div>
    </div>

    <!-- Xóa ảnh -->
    <div class="modal fade modal-remove-product" id="exampleModalDelImg<?=$img['id']?>" tabindex="-1" aria-labelledby="exampleModalLabelDelImg<?=$img['id']?>"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelDelImg<?=$img['id']?>">Bạn có chắc xóa ảnh này?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span class="text-danger">Lưu ý</span>: Sau khi xóa nhưng thông tin liên quan đến ảnh này cũng
                    sẽ biến mất theo.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary  btn-del-image-product" data-id="<?=$img['id']?>">Xóa</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>