<?php
class BookTicketsModel extends Model
{
    public function __construct()
    {

    }

    public function getAllBookTickets()
    {
        $data = $this->Select("SELECT * FROM tickets");
    }

    public function getAllBookTicketsWithCondition($condition)
    {
        $data = $this->Select("SELECT * FROM tickets WHERE " . $condition);
        return $data;
    }

    public function getEnterCategoryService($id)
    {
        $data = $this->Select("SELECT * FROM enterservice_category WHERE escate_id = " . $id);
        return $data;
    }
}
?>