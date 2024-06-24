<div class="container w-70 mt-0" style="max-width: 100% !important; margin-bottom: 72px !important;">
    <?php
    $this->render('blocks/admin/navbar');
    ?>
    <div class="handel-field m-3">
        <a href="<?php echo _HOST_PATH_ ?>/admin/Account" class="me-1 px-3 fw-bold text-light btn btn-danger">
            <i class="fa-solid fa-arrow-left"></i>
            Quay lại
        </a>
    </div>
    <?php
    getSmg();
    ?>
    <div class="mt-4 field-input d-flex justify-content-center align-items-center">
        <form action="<?php echo _HOST_PATH_ ?>/admin/Account/postAddAccount" method="post" class="w-50">
            <div class="mb-3">
                <h5>Thông tin đăng nhập</h5>
                <div class="mb-3">
                    <label for="">Tên đăng nhập</label>
                    <input type="text" name="username" id="" class="form-control" placeholder="Nhập tên đăng nhập">
                </div>
                <div class="mb-3">
                    <label for="">Mật khẩu</label>
                    <input type="password" name="password" id="" class="form-control" placeholder="Nhập mật khẩu">
                </div>
                <div class="mb-3">
                    <label for="">Nhập lại mật khẩu</label>
                    <input type="password" name="password" id="" class="form-control" placeholder="Nhập lại mật khẩu">
                </div>
            </div>
            <div class="mb-3 mt-3">
                <h5>Thông tin cá nhân</h5>
                <div class="mb-3 d-flex">
                    <div class="me-3" style="flex: 1;">
                        <label for="">Họ tên</label>
                        <input type="text" name="full_name" id="" class="form-control" placeholder="Nhập họ tên">
                    </div>
                    <div class="" width="40%">
                        <label for="">Vai trò</label>
                        <select name="role" id="" class="form-control">
                            <option value="0">Admin</option>
                            <option value="1">Khách hàng</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 d-flex">
                    <div class="w-50 me-3">
                        <label for="">Email</label>
                        <input type="email" name="email" id="" class="form-control" placeholder="Nhập email">
                    </div>
                    <div class="w-50">
                        <label for="">Số điện thoại</label>
                        <input type="text" name="phone_number" id="" class="form-control" placeholder="Nhập số điện thoại">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="">Quốc tịch</label>
                    <select name="country" id="country" class="form-control">
                        <option value="">Chọn quốc tịch</option>
                        <option value="Việt Nam">Việt Nam</option>
                        <option value="Hoa Kỳ">Hoa Kỳ</option>
                        <option value="Nhật Bản">Nhật Bản</option>
                        <option value="Hàn Quốc">Hàn Quốc</option>
                        <option value="Trung Quốc">Trung Quốc</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Địa chỉ</label>
                    <input type="text" name="address" id="" class="form-control" placeholder="Nhập địa chỉ">
                </div>
                <div class="mb-3">
                    <label for="">CMND/CCCD</label>
                    <input type="text" name="id_number" id="" class="form-control" placeholder="Nhập số CCCD/CMND">
                </div>
            </div>

            <div class="w-100 d-flex justify-content-center align-items-center">
                <button type="submit" class="w-100 mt-3 btn btn-primary py-2 fw-bold">Xác nhận thêm</button>
            </div>
        </form>
    </div>
</div>