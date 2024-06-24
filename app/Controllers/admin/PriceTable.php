<?php

class PriceTable extends Controller {
    public $data = [];
    public $model_home;
    public function __construct()
    {
        $this->model_home = $this->model('PriceTableModel');
        $this->data['sub_content'][''] = "";
        $navItem = [
            'Danh mục',
            'Thông tin dịch vụ'
        ];
        $navLink = [
            'Service',
            'PriceTable'
        ];
        $this->data['navItem'] = $navItem;
        $this->data['navLink'] = $navLink;
        $this->data['activeService'] = true;
    }

    public function index()
    {
        $listService = $this->model_home->getAllService();
        $this->data['sub_content']['listService'] = $listService;
        $serviceCate = $this->model('ServiceModel');
        $serCateNames = [];
        foreach($listService as $key => $value) {
            $id = $value['serviceCate_id'];
            $serCateName = $serviceCate->getCateService($id)[0]['serviceCate_name'];
            $serCateNames[$key] = $serCateName;
        }
       
        $this->data['sub_content']['serCateNames'] = $serCateNames;
        $this->data['sub_content']['listService'] = $listService;
        $this->data['title'] = 'Thông tin dịch vụ';
        $this->data['content'] = 'admin\services\detailService\list';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function getAddService() {
        $serviceCate = $this->model('ServiceModel');
        $listSerCate = $serviceCate->getAllServiceCate();
        $this->data['sub_content']['listSerCate'] = $listSerCate;

        $this->data['title'] = 'Thêm dịch vụ';
        $this->data['content'] = 'admin\services\detailService\add';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function handelImage()
    {
        $image = $_FILES['service_img'];
        if (!empty($image['name'])) {
            $extend = '.jpg';
            if (explode("/", $image['type'])[1] == 'png') $extend = '.png';
            $fileName = time() . $extend;
            move_uploaded_file(
                $_FILES['service_img']['tmp_name'],
                'C:\xampp\htdocs\MVC\public\assets\admin\images\priceTable_image\priceTable-' . $fileName
            );
            $fileName = 'priceTable-' . $fileName;
            return $fileName;
        }
    }
    public function postAddService() {
        $fileName = $this->handelImage();
        if ($this->model_home->addService($fileName)) {
            $msg = 'Thêm thông tin dịch vụ thành công';
            $type_msg = 'success';
        } else {
            $msg = 'Thêm thông tin dịch vụ thất bại';
            $type_msg = 'danger';
        }
        setFlashData('msg', $msg);
        setFlashData('type_msg', $type_msg);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function getIdService()
    {
        $url = $_SERVER['PATH_INFO'];
        $arr = explode("/", $url);
        $arr =  $arr[count($arr) - 1];
        $id = explode("=", $arr)[1];
        return $id;
    }

    public function getEditService() {
        $detail = $this->model_home->getService($this->getIdService());
        $this->data['sub_content']['detail'] = $detail[0];

        $serviceCate = $this->model('ServiceModel');
        $listSerCate = $serviceCate->getAllServiceCate();
        $this->data['sub_content']['listSerCate'] = $listSerCate;

        $this->data['title'] = 'Sửa thông tin dịch vụ';
        $this->data['content'] = 'admin\services\detailService\edit';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function postEditService() {
        $id = $this->getIdService();
        $fileName = $this->handelImage();
        if ($this->model_home->updateService($id, $fileName)) {
            $msg = 'Cập nhật thông tin dịch vụ thành công';
            $type_msg = 'success';
        } else {
            $msg = 'Cập nhật thông tin dịch vụ thất bại';
            $type_msg = 'danger';
        }
        setFlashData('msg', $msg);
        setFlashData('type_msg', $type_msg);
        redirect($_SERVER['HTTP_REFERER']);
    }
}