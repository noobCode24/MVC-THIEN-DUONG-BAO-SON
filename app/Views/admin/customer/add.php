<div class="container w-70 mt-0" style="max-width: 100% !important;">
    <?php
    $this->render('blocks/admin/navbar');
    ?>
    <div class="handel-field m-3">
        <a href="<?php echo _HOST_PATH_ ?>/admin/Customer/" class="me-1 px-3 fw-bold text-light btn btn-danger">
            <i class="fa-solid fa-arrow-left"></i>
            Quay lại
        </a>
    </div>
    <?php
    getSmg();
    ?>
    <div class="mt-4 field-input d-flex justify-content-center align-items-center">
        <form action="<?php echo _HOST_PATH_ ?>/admin/Customer/postAddCustomer" method="post" class="w-50">
            <div class="mb-3">
                <label for="">Tên khách hàng</label>
                <input type="text" name="full_name" id="" class="form-control" placeholder="Nhập tên khách hàng">
            </div>
            <div class="mb-3">
                <label for="">Email</label>
                <input type="text" name="email" id="" class="form-control" placeholder="Nhập email">
            </div>
            <div class="mb-3">
                <label for="">Số điện thoại</label>
                <input type="text" name="phone_number" id="" class="form-control" placeholder="Nhập số điện thoại">
            </div>
            <div class="mb-3">
                <label for="">Quốc gia</label>
                <select name="country" id="country" class="form-control">
                    <option value="">Chọn quốc gia</option>
                    <option value="Việt Nam">Việt Nam</option>
                    <option value="Hoa Kỳ">Hoa Kỳ</option>
                    <option value="Nhật Bản">Nhật Bản</option>
                    <option value="Hàn Quốc">Hàn Quốc</option>
                    <option value="Trung Quốc">Trung Quốc</option>
                    <!-- Thêm các quốc gia khác tùy ý -->
                </select>
            </div>
            <div class="mb-3">
                <label for="">CMND/CCCD</label>
                <input type="text" name="id_number" id="" class="form-control" placeholder="Nhập số CCCD/CMND">
            </div>
            <div class="mb-3">
                <label for="">Địa chỉ</label>
                <input type="text" name="address" id="" class="form-control" placeholder="Nhập địa chỉ">
            </div>

            <div class="w-100 d-flex justify-content-center align-items-center">
                <button type="submit" class="w-100 mt-3 btn btn-primary py-2 fw-bold">Xác nhận thêm</button>
            </div>
        </form>
    </div>
</div>