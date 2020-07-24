<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Code extends CI_Controller
{
    public function index()
    {
        $this->load->view('template/head');
        $this->load->view('template/sitebar');
        $this->load->view('template/topbar');
        $this->load->view('conten/CRUDE');
        $this->load->view('template/foot');
    }

    public function home()
    {
        $this->load->model('Items_model');
        $data2['items']=$this->Items_model->get_all();
        $this->load->view('template/head');
        $this->load->view('template/sitebar');
        $this->load->view('template/topbar');
        $this->load->view('conten/home',$data2);
        $this->load->view('template/foot');
    }
}
