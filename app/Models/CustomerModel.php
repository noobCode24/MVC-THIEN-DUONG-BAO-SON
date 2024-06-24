<?php
class CustomerModel extends Model
{
    public function __construct()
    {
        // echo "events model";
    }

    public function getAllCustomer()
    {
        $data = $this->Select("SELECT * FROM customers");
        return $data;
    }

    public function getAllCustomerWithCondition($condition)
    {
        $data = $this->Select("SELECT * FROM customers WHERE " . $condition);
        return $data;
    }

    public function detailCustomer($id)
    {
        $sql = 'SELECT * from customers WHERE  customer_id = ' . $id;
        $detail = $this->Select($sql);
        return $detail;
    }


    public function addCustomer($data)
    {
        $addStatus = $this->Insert('customers', $data);
        if ($addStatus)
            return true;
        return false;
    }

    public function deleteCustomer($id)
    {
        $condition = 'customer_id = ' . $id;
        $deleteStatus = $this->Delete('customers', $condition);
        if ($deleteStatus)
            return true;
        return false;
    }

    public function updateCustomer($id)
    {
        $filterAll = filter();
        $filterAll['updated_at'] = date('Y/m/d');
        $condition = 'customer_id = ' . $id;
        $updateStatus = $this->Update('customers', $filterAll, $condition);
        if ($updateStatus)
            return true;
        return false;
    }

    public function getFullName($id) {
        $sql = "SELECT full_name FROM customers WHERE customer_id = '$id'";
        return $this->Select($sql)[0]['full_name'];
    }

    public function getIdCustomer() {
        $sql = "SELECT customer_id FROM customers ORDER BY customer_id DESC LIMIT 1";
        return $this->Select($sql)[0]['customer_id'];
    }
}
?>