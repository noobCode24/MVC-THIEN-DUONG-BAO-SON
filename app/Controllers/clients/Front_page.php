<?php
class Front_page extends Controller
{
    public $data = [];
    public $model_home;

    public function __construct()
    {
        // $this->model_home = $this->model('TicketsModel');
        $this->data['sub_content'][''] = "";

    }

    public function index()
    {
        // $ticketList = $this->model_home->getAllTypeTicket();
        // $this->data['sub_content']['ticketList'] = $ticketList;
        // $ticketList = $this->model_home->getAddTypeTicket();
        // $this->data['sub_content']['ticketList'] = $ticketList;
        // echo '<pre>';
        // print_r($ticketList);
        // echo '</pre>';

        $this->data['content'] = 'clients/Book_tickets/index';
        $this->render('layouts/clients_layout', $this->data);
    }
}
?>