<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Run extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Get');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $query["user_data"]= $this->Get->GET_ALL();
        $this->load->view('WELCOME/welcome', $query);
    }
    public function lan()
    {
        $query["user_data"]= $this->Get->GET_ALL();
        $data=0;
        foreach ($query["user_data"] as $row) {
            if (!$row->ID_USER==null) {
                $last_id=$row->ID_USER;
                $data=$last_id;
            }
        }
        return $data;
    }
    
    public function form_view()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['id']=$this->lan();
        // var_dump($data);

        if ($this->form_validation->run() == false) {
            $this->load->view('WELCOME/update', $data);
        } else {
            var_dump($data);
            die;
            $this->Get->BUAT_DATA($data);
            $pas="succes";
            redirect('/', $pas);
        }
    }
    public function kirim()
    {
        $this->Get->BUAT_DATA();
        $pas="succes";
        redirect('/', $pas);
    }
    public function ADMIN()
    {
        $this->load->view('Hello');
    }
}
