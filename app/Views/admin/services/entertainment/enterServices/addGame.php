<div class="container mt-0" style="max-width: 100% !important;">
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
    ?>
    <div class="mt-4 field-input d-flex justify-content-center align-items-center">
        <form action="<?php echo _HOST_PATH_ ?>/admin/EnterServices/postAddEnterServices" method="post" class="w-50">
            <div class="d-flex justify-content-between">
                <div class="mb-3" style="width: 49%;">
                    <label for="">Tên trò chơi</label>
                    <input type="text" name="enterservice_name" id="" class="form-control" placeholder="Nhập tên trò chơi">
                </div>
                <div class="mb-3" style="width: 49%;">
                    <label for="">Danh mục</label>
                    <select name="escate_id" id="" class="form-control">
                        <?php
                        if (!empty($listCate)) {
                            foreach ($listCate as $value) {
                        ?>
                                <option value="<?php echo $value['escate_id'] ?>">
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
            </div>
            <!-- <div class="mb-3">
                <label for="">Khu vực</label>
                <select name="area_id" id="" class="form-control">
                <?php
                if (!empty($listCate)) {
                    foreach ($listCate as $value) {
                ?>
                            <option value="<?php echo $value['escate_id'] ?>">
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
            </div> -->
            <div class="mb-3">
                <label for="">Mô tả</label>
                <!-- <input type="text" name="game_desc" id="" class="form-control" placeholder="Nhập mô tả"> -->
                <textarea style="height: 120px;" name="enterservice_desc" id="" placeholder="Nhập mô tả" class="form-control"></textarea>
            </div>
            <!-- <div class="mb-3">
                <label for="">Số người tham gia</label>
                <div class="d-flex">
                    <input type="text" name="min_participants" id="" class="w-40 form-control" placeholder="Min">
                    <input type="text" name="max_participants" id="" class="w-40 form-control" placeholder="Max">
                </div>
            </div> -->
            <div class="mb-3">
                <label for="">Giá vé</label>
                <input type="text" name="enterservice_price" id="" class="form-control" placeholder="Nhập giá vé (VNĐ)">
            </div>
            <div class="mb-3">
                <label for="">Độ tuổi tối thiểu</label>
                <input type="text" name="age_limit" id="" class="form-control" placeholder="Nhập độ tuổi tối thiểu">
            </div>
            <div class="mb-3">
                <label for="">Quy định khác</label>
                <input type="text" name="enterservice_regulations" id="" class="form-control" placeholder="Nhập quy định khác (nếu có)">
            </div>
            <div class="mb-3">
                <label for="">Trạng thái</label>
                <select name="status" id="status" class="form-control">
                    <option class="text-center">Chọn trạng thái</option>
                    <option class="btn btn-light" value="1">Hoạt động</option>
                    <option class="btn btn-light" value="0">Bảo trì</option>
                </select>
                <div class="w-100 d-flex justify-content-center align-items-center">
                    <button type="submit" class="w-100 mt-3 btn btn-primary py-2 fw-bold">Thêm trò chơi</button>
                </div>
            </div>
        </form>
    </div>
</div>