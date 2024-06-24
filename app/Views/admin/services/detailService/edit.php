<div class="container mt-0" style="max-width: 100% !important;">
    <?php
    $this->render('blocks/admin/navbar');
    // echo $detail['service_id'];
    ?>
    <div class="handel-field m-3">
        <a href="<?php echo _HOST_PATH_ ?>\admin\PriceTable" class="me-1 px-3 fw-bold text-light btn btn-danger">
            <i class="fa-solid fa-arrow-left"></i>
            Quay lại
        </a>
    </div>
    <?php
    getSmg();
    ?>
    <h1 class="text-center w-100 mb-3 text-primary">Sửa thông tin dịch vụ</h1>
    <hr class="w-50 m-auto mb-4">
    <div class="mt-4 field-input d-flex justify-content-center align-items-center">
        <form action="<?php echo _HOST_PATH_ ?>\admin\PriceTable\postEditService\id=<?php echo $detail['service_id'] ?>" method="post" class="w-50" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="">Tiêu đề</label>
                <input type="text" value="<?php echo $detail['service_title'] ?>" name="service_title" id="" class="form-control">
            </div>

            <div class="mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div style="flex: 1; margin-right: 16px;">
                        <label for="">Chọn ảnh nếu muốn thay đổi</label>
                        <input type="file" name="service_img" id="" class="form-control">
                    </div>
                    <img width="200px" src="<?php echo _HOST_PATH_ ?>\public\assets\admin\images\priceTable_image\<?php echo $detail['service_img'] ?>" alt="">
                </div>
                <div class="w-100 mb-3">
                    <label for="">Danh mục</label>
                    <select style="min-width: 100%;" name="serviceCate_id" id="" class="form-control">
                        <option value="">--- Chọn danh mục dịch vụ ---</option>
                        <?php
                        if (!empty($listSerCate)) {
                            foreach ($listSerCate as $value) {
                        ?>
                                <option <?php if ($detail['serviceCate_id'] ==  $value['serviceCate_id']) echo 'selected'  ?> value="<?php echo $value['serviceCate_id']; ?>"><?php echo $value['serviceCate_name'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="mt-4 w-100 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </form>
    </div>
</div>