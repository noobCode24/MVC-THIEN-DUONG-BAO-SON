<div class="container w-70 mt-0" style="max-width: 100% !important;">
    <?php
    $this->render('blocks/admin/navbar');
    ?>
    <div class="handel-field m-3">
        <a href="<?php echo _HOST_PATH_ ?>/admin/EnterServices/" class="me-1 px-3 fw-bold text-light btn btn-danger">
            <i class="fa-solid fa-arrow-left"></i>
            Quay lại
        </a>
    </div>
    <?php
    getSmg();
    if (!empty($dataGame)) $arrData = $dataGame;
    ?>
    <div class="mt-4 field-input d-flex justify-content-center align-items-center">
        <form action="<?php echo _HOST_PATH_ ?>/admin/EnterServices/postEditEnterServices/id = <?php echo $arrData['enterservice_id'] ?>" method="post" class="w-50">
            <div class="mb-3">
                <label for="">Tên trò chơi</label>
                <input type="text" name="enterservice_name" id="" class="form-control" placeholder="Nhập tên trò chơi" value="<?php echo $arrData['enterservice_name'] ?>">
            </div>
            <div class="mb-3">
                <label for="">Danh mục</label>
                <select name="escate_id" id="" class="form-control">
                    <?php
                    if (!empty($listCate)) {
                        foreach ($listCate as $value) {
                    ?>
                            <option value="<?php
                                            echo $value['escate_id'];
                                            ?>" <?php
                                                if ($value['escate_id'] == $arrData['escate_id']) {
                                                    echo 'selected';
                                                }
                                                ?>>
                                <?php echo $value['escate_name'] ?>
                            </option>
                        <?php
                        }
                    } else {
                        ?>
                        <option value="">Không có danh mục</option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="">Mô tả</label>
                <textarea name="enterservice_desc" id="" placeholder="Nhập mô tả" class="form-control" style="height: 120px"><?php echo $arrData['enterservice_desc'] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="">Số người tham gia</label>
                <div class="d-flex">
                    <input type="text" name="min_participants" id="" class="w-40 form-control" placeholder="Min">
                    <input type="text" name="max_participants" id="" class="w-40 form-control" placeholder="Max">
                </div>
            </div>
            <div class="mb-3">
                <label for="">Giới hạn độ tuổi</label>
                <input type="text" name="age_limit" id="" class="form-control" placeholder="Nhập giới hạn độ tuổi (nếu có)" value=" <?php echo ($arrData['age_limit']) ? $arrData['age_limit'] : 'Không có' ?>">
            </div>
            <div class="mb-3">
                <label for="">Quy định khác</label>
                <input type="text" name="enterservice_regulations" id="" class="form-control text-left" placeholder="Nhập quy định (nếu có)" value="<?php echo ($arrData['enterservice_regulations']) ? $arrData['enterservice_regulations'] : 'Không có' ?>" </div>
                <div class="mb-3">
                    <label for="">Trạng thái</label>
                    <select name="status" id="status" class="form-control <?php echo ($arrData['status'] == 1 ? 'btn btn-success' : 'btn btn-danger') ?>">
                        <option class="text-center">Chọn trạng thái</option>
                        <option class="btn btn-light" value="1" <?php
                                                                if ($arrData['status'] == 1) echo 'selected'
                                                                ?>>Hoạt động
                        </option>
                        <option class="btn btn-light" value="0" <?php
                                                                if ($arrData['status'] == 0) echo 'selected'
                                                                ?>>Bảo trì
                        </option>
                    </select>
                </div>
                <div class="w-100 d-flex justify-content-center align-items-center">
                    <button type="submit" class="w-100 mt-3 btn btn-primary py-2 fw-bold">Cập nhật</button>
                </div>
        </form>
    </div>
</div>