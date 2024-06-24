<?php
class AccountModel extends Model
{
    public function __construct()
    {
    }

    public function getAllAccount($condition) {
        $sql = "SELECT * FROM account";
        if(!empty($condition)) {
            $sql .= " WHERE " . $condition;
        }
         return $this->Select($sql);
    }

    public function detailAccount($id)
    {
        $sql = "SELECT * from account WHERE username = '$id'";
        $detail = $this->Select($sql);
        return $detail;
    }

    public function addAccount($data) {
        $insertStatus =  $this->Insert('account',$data);
        if($insertStatus) return true;
        return false;
    }

    public function deleteAccount($username)
    {
        $condition = "username = '$username'";
        $deleteStatus = $this->Delete('account', $condition);
        if ($deleteStatus)
            return true;
        return false;
    }
    public function updateAccount($username)
    {
        $filterAll = filter();
        $filterAll['updated_at'] = date('Y/m/d');
        $condition = "username = '$username'";
        $updateStatus = $this->Update('account', $filterAll, $condition);
        if ($updateStatus)
            return true;
        return false;
    }
}
