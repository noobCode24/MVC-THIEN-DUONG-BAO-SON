<div class="container mt-0" style="max-width: 100% !important;">
    <?php
    $this->render('blocks/admin/navbar');
    ?>
    <div class="handel-field m-3">
        <a href="<?php echo _HOST_PATH_ ?>\admin\Service" class="me-1 px-3 fw-bold text-light btn btn-danger">
            <i class="fa-solid fa-arrow-left"></i>
            Quay lại
        </a>
    </div>
    <?php
    getSmg();
    ?>
    <h1 class="text-center w-100 mb-3 text-primary">Thêm thông tin dịch vụ</h1>
    <hr class="w-50 m-auto mb-4">
    <div class="mt-4 field-input d-flex justify-content-center align-items-center">
        <form action="<?php echo _HOST_PATH_ ?>\admin\PriceTable\postAddService" method="post" class="w-50" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="">Tiêu đề</label>
                <input type="text" name="service_title" id="" class="form-control">
            </div>

            <div class="mb-3 d-flex justify-content-between align-items-center">
                <div style="flex: 1; margin-right: 16px;">
                    <label for="">Chọn ảnh</label>
                    <input type="file" name="service_img" id="" class="form-control">
                </div>
                <div style="width: fit-content;">
                    <label for="">Danh mục</label>
                    <select style="min-width: 100%;" name="serviceCate_id" id="" class="form-control">
                        <option selected value="">--- Chọn danh mục dịch vụ ---</option>
                        <?php
                        if (!empty($listSerCate)) {
                            foreach ($listSerCate as $value) {
                        ?>
                                <option value="<?php echo $value['serviceCate_id']; ?>"><?php echo $value['serviceCate_name'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="mt-4 w-100 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
        </form>
    </div>
</div>