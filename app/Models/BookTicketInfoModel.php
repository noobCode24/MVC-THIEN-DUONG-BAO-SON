<?php
class BookTicketInfoModel extends Model
{
    public function __construct()
    {

    }

    public function getAllBookTicketInfo()
    {
        $data = $this->Select("SELECT 
                                    c.customer_id,
                                    c.full_name,
                                    c.email,
                                    c.phone_number,
                                    b.booking_id,
                                    b.booking_date,
                                    b.date_of_use,
                                    b.total_price,
                                    b.paymet_status
                                FROM 
                                    customers c
                                JOIN 
                                    booking b ON c.customer_id = b.customer_id");
        return $data;
    }

    public function getAllBookTicketInfoWithCondition($condition)
    {
        $sql = "SELECT 
                    c.customer_id,
                    c.full_name,
                    c.email,
                    c.phone_number,
                    b.booking_id,
                    b.booking_date,
                    b.date_of_use,
                    b.total_price,
                    b.paymet_status
                FROM 
                    customers c
                JOIN 
                    booking b ON c.customer_id = b.customer_id
                WHERE " . $condition;
        $data = $this->Select($sql);
        return $data;
    }

    public function getAllBookTicketInfoWithDetails($id)
    {
        $sql = "SELECT 
                    c.customer_id,
                    c.full_name,
                    c.email,
                    c.phone_number,
                    b.booking_date,
                    b.date_of_use,
                    b.total_price,
                    b.paymet_status,
                    t.ticket_name,
                    bd.quantity,
                    bd.price
                FROM 
                    customers c
                JOIN 
                    booking b ON c.customer_id = b.customer_id
                JOIN 
                    booking_detail bd ON b.booking_id = bd.booking_id
                JOIN 
                    ticket t ON bd.ticket_id = t.ticket_id
                WHERE 
                    b.booking_id = :id";
        $data = $this->Select($sql, [':id' => $id]);
        return $data;
    }

    public function deleteBookTicketInfo($id)
    {
        $condition = 'booking_id = ' . $id;
        $deleteStatus = $this->Delete('booking', $condition);
        if ($deleteStatus)
            return true;
        return false;
    }
}
?>
