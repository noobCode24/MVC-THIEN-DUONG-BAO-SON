<?php
class Account extends Controller
{
    public $data = [];
    public $model_home;
    public function __construct()
    {
        $this->model_home = $this->model('AccountModel');
        $navItem = [
            'Thông tin khách hàng',
            'Tài khoản'
        ];
        $navLink = [
            'Customer',
            'Account'
        ];
        $this->data['navItem'] = $navItem;
        $this->data['navLink'] = $navLink;
        $this->data['sub_content'][''] = "";
        $this->data['activeCustomer'] = true;
    }

    public function index()
    {
        $condition = '';
        if (!empty($_POST)) {
            foreach ($_POST as $key => $value) {
                if (empty($value))
                    continue;
                if (is_string($value)) {
                    $condition .= $key . "='" . $value . "' and ";
                } else if (is_numeric($value)) {
                    $condition .= $key . "=" . $value . " and ";
                }
            }
        }
        $condition = rtrim($condition, ' and ');
        $listAccount = $this->model_home->getAllAccount($condition);
        $this->data['activeCustomer'] = true;
        $this->data['content'] = 'admin\account\list';
        $this->data['title'] = 'Quản lí tài khoản';
        $this->data['sub_content']['listAccount'] = $listAccount;
        $this->render('layouts/admin_layout', $this->data);
    }

    public function getAddAccount()
    {
        $this->data['content'] = 'admin\account\add';
        $this->data['title'] = 'Thêm tài khoản';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function postAddAccount()
    {
        echo '<pre>';
        print_r(filter());
        echo '</pre>';
        // die();
        $customerModel = $this->model('CustomerModel');
        $customerData = [
            'full_name' => filter()['full_name'],
            'email' => filter()['email'],
            'phone_number' => filter()['phone_number'],
            'address' => filter()['address'],
            'country' => filter()['country'],
            'id_number' => filter()['id_number'],
        ];
        if ($customerModel->addCustomer($customerData)) {
            $id = $customerModel->getIdCustomer();
            $accountData = [
                'username' => filter()['username'],
                'password' => password_hash( filter()['password'],PASSWORD_DEFAULT),
                'role' => filter()['role'],
                'customer_id' => $id,
                'created_at' => date('Y-m-d H:i:s'),
            ];
            if ($this->model_home->addAccount($accountData)) {
                $msg = 'Thêm tài khoản thành công';
                $type_msg = 'success';
            } else {
                $msg = 'Thêm tài khoản thất bại';
                $type_msg = 'danger';
            }
            setFlashData('msg', $msg);
            setFlashData('type_msg', $type_msg);
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function getIdAccount()
    {
        $url = $_SERVER['PATH_INFO'];
        $arr = explode("/", $url);
        $arr = $arr[count($arr) - 1];
        $id = explode("=", $arr)[1];
        return $id;
    }

    public function getEditAccount()
    {
        $id = $this->getIdAccount();
        echo $id;
        $dataAcc = $this->model_home->detailAccount($id);
        echo '<pre>';
        print_r($dataAcc);
        echo '</pre>';
        $this->data['sub_content']['dataAcc'] = $dataAcc[0];
        $this->data['content'] = 'admin/account/edit';
        $this->data['title'] = 'Sửa thông tin tài khoản';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function postEditAccount()
    {
        $id = $this->getIdAccount();
        if ($this->model_home->updateAccount($id)) {
            $msg = 'Cập nhật thông tin tài khoản thành công';
            $type_msg = 'success';
        } else {
            $msg = 'Cập nhật thông tin tài khoản thất bại';
            $type_msg = 'danger';
        }
        setFlashData('msg', $msg);
        setFlashData('type_msg', $type_msg);
        // setFlashData('username',)
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function handleDeleteAccount()
    {
        $id = $this->getIdAccount();
        if ($this->model_home->deleteAccount($id)) {
            $msg = 'Xóa tài khoản thành công';
            $type_msg = 'success';
        } else {
            $msg = 'Xóa tài khoản thất bại';
            $type_msg = 'danger';
        }
        setFlashData('msg', $msg);
        setFlashData('type_msg', $type_msg);
        redirect($_SERVER['HTTP_REFERER']);
    }
}
