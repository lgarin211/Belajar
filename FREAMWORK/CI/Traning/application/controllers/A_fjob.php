<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class A_fjob extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('A_fjob_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', true));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'a_fjob/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'a_fjob/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'a_fjob/index.html';
            $config['first_url'] = base_url() . 'a_fjob/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = true;
        $config['total_rows'] = $this->A_fjob_model->total_rows($q);
        $a_fjob = $this->A_fjob_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'a_fjob_data' => $a_fjob,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('a_fjob/FJOB_list', $data);
    }

    public function read($id)
    {
        $row = $this->A_fjob_model->get_by_id($id);
        if ($row) {
            $data = array(
        'ID_JOB' => $row->ID_JOB,
        'ID_TUGAS' => $row->ID_TUGAS,
        'AT_TIME' => $row->AT_TIME,
        'SCRORE' => $row->SCRORE,
        );
            $this->load->view('a_fjob/FJOB_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('a_fjob'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('a_fjob/create_action'),
        'ID_JOB' => set_value('ID_JOB'),
        'ID_TUGAS' => set_value('ID_TUGAS'),
        'AT_TIME' => set_value('AT_TIME'),
        'SCRORE' => set_value('SCRORE'),
    );
        $this->load->view('a_fjob/FJOB_form', $data);
    }
    
    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {
            $data = array(
        'ID_TUGAS' => $this->input->post('ID_TUGAS', true),
        'AT_TIME' => $this->input->post('AT_TIME', true),
        'SCRORE' => $this->input->post('SCRORE', true),
        );

            $this->A_fjob_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('a_fjob'));
        }
    }
    
    public function update($id)
    {
        $row = $this->A_fjob_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('a_fjob/update_action'),
        'ID_JOB' => set_value('ID_JOB', $row->ID_JOB),
        'ID_TUGAS' => set_value('ID_TUGAS', $row->ID_TUGAS),
        'AT_TIME' => set_value('AT_TIME', $row->AT_TIME),
        'SCRORE' => set_value('SCRORE', $row->SCRORE),
        );
            $this->load->view('a_fjob/FJOB_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('a_fjob'));
        }
    }
    
    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->update($this->input->post('ID_JOB', true));
        } else {
            $data = array(
        'ID_TUGAS' => $this->input->post('ID_TUGAS', true),
        'AT_TIME' => $this->input->post('AT_TIME', true),
        'SCRORE' => $this->input->post('SCRORE', true),
        );

            $this->A_fjob_model->update($this->input->post('ID_JOB', true), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('a_fjob'));
        }
    }
    
    public function delete($id)
    {
        $row = $this->A_fjob_model->get_by_id($id);

        if ($row) {
            $this->A_fjob_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('a_fjob'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('a_fjob'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('ID_TUGAS', 'id tugas', 'trim|required');
        $this->form_validation->set_rules('AT_TIME', 'at time', 'trim|required');
        $this->form_validation->set_rules('SCRORE', 'scrore', 'trim|required');

        $this->form_validation->set_rules('ID_JOB', 'ID_JOB', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "FJOB.xls";
        $judul = "FJOB";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "ID TUGAS");
        xlsWriteLabel($tablehead, $kolomhead++, "AT TIME");
        xlsWriteLabel($tablehead, $kolomhead++, "SCRORE");

        foreach ($this->A_fjob_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteNumber($tablebody, $kolombody++, $data->ID_TUGAS);
            xlsWriteLabel($tablebody, $kolombody++, $data->AT_TIME);
            xlsWriteNumber($tablebody, $kolombody++, $data->SCRORE);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=FJOB.doc");

        $data = array(
            'FJOB_data' => $this->A_fjob_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('a_fjob/FJOB_doc', $data);
    }
}
