<?php

class PriceTableModel extends Model
{
    public function __construct()
    {

    }

    public function getAllService()
    {
        $data = $this->Select("SELECT * FROM service");
        return $data;
    }

    public function getAllServiceWidthCondition($id)
    {
        $data = $this->Select("SELECT * FROM service WHERE serviceCate_id = $id");
        return $data;
    }
    
    public function addService($path)
    {
        $filterAll = filter();
        $filterAll['created_at'] = date('Y/m/d H:i:s');
        $filterAll['updated_at'] = null;
        $filterAll['service_img'] = $path;
        $addStatus = $this->Insert('service', $filterAll);
        if ($addStatus) return true;
        return false;
    }

    public function getService($id) {
        $data = $this->Select("SELECT * FROM service WHERE service_id = $id");
        return $data;
    }
    
    

    // public function deleteNew($id)
    // {
    //     if($this->checkTypeNew($id) == 1) {
    //         $sql = "SELECT *  FROM `news` WHERE created_at = (SELECT MAX(created_at) FROM news)";
    //         $new = $this->Select($sql);
    //         if(!empty($new)){
    //             $idPriNew = $new[0]['new_id'];
    //             $sql = "UPDATE news SET new_type = 1 WHERE new_id = $idPriNew";
    //             $this->ExecuteSql($sql);
    //         }
    //     }
    //     $condition = 'new_id = ' . $id;
    //     $deleteStatus = $this->Delete('news', $condition);
    //     if ($deleteStatus) return true;
    //     return false;
    // }

    public function updateService($id, $path)
    {
        $filterAll = filter();
        $filterAll['updated_at'] = date('Y/m/d H:i:s');
        if (!empty($path)) {
            $filterAll['service_img'] = $path;
        }
        $condition = 'service_id = ' . $id;
        $updateStatus = $this->Update('service', $filterAll, $condition);
        if ($updateStatus) return true;
        return false;
    }
}
