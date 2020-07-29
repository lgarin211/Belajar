<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class A_raport extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('A_raport_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', true));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'a_raport/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'a_raport/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'a_raport/index.html';
            $config['first_url'] = base_url() . 'a_raport/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = true;
        $config['total_rows'] = $this->A_raport_model->total_rows($q);
        $a_raport = $this->A_raport_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'a_raport_data' => $a_raport,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('a_raport/RAPORT_list', $data);
    }

    public function read($id)
    {
        $row = $this->A_raport_model->get_by_id($id);
        if ($row) {
            $data = array(
        'ID_RAPORT' => $row->ID_RAPORT,
        'ID_KELAS' => $row->ID_KELAS,
        'ID_JOB' => $row->ID_JOB,
        );
            $this->load->view('a_raport/RAPORT_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('a_raport'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('a_raport/create_action'),
        'ID_RAPORT' => set_value('ID_RAPORT'),
        'ID_KELAS' => set_value('ID_KELAS'),
        'ID_JOB' => set_value('ID_JOB'),
    );
        $this->load->view('a_raport/RAPORT_form', $data);
    }
    
    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {
            $data = array(
        'ID_KELAS' => $this->input->post('ID_KELAS', true),
        'ID_JOB' => $this->input->post('ID_JOB', true),
        );

            $this->A_raport_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('a_raport'));
        }
    }
    
    public function update($id)
    {
        $row = $this->A_raport_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('a_raport/update_action'),
        'ID_RAPORT' => set_value('ID_RAPORT', $row->ID_RAPORT),
        'ID_KELAS' => set_value('ID_KELAS', $row->ID_KELAS),
        'ID_JOB' => set_value('ID_JOB', $row->ID_JOB),
        );
            $this->load->view('a_raport/RAPORT_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('a_raport'));
        }
    }
    
    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->update($this->input->post('ID_RAPORT', true));
        } else {
            $data = array(
        'ID_KELAS' => $this->input->post('ID_KELAS', true),
        'ID_JOB' => $this->input->post('ID_JOB', true),
        );

            $this->A_raport_model->update($this->input->post('ID_RAPORT', true), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('a_raport'));
        }
    }
    
    public function delete($id)
    {
        $row = $this->A_raport_model->get_by_id($id);

        if ($row) {
            $this->A_raport_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('a_raport'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('a_raport'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('ID_KELAS', 'id kelas', 'trim|required');
        $this->form_validation->set_rules('ID_JOB', 'id job', 'trim|required');

        $this->form_validation->set_rules('ID_RAPORT', 'ID_RAPORT', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "RAPORT.xls";
        $judul = "RAPORT";
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
        xlsWriteLabel($tablehead, $kolomhead++, "ID KELAS");
        xlsWriteLabel($tablehead, $kolomhead++, "ID JOB");

        foreach ($this->A_raport_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteNumber($tablebody, $kolombody++, $data->ID_KELAS);
            xlsWriteNumber($tablebody, $kolombody++, $data->ID_JOB);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=RAPORT.doc");

        $data = array(
            'RAPORT_data' => $this->A_raport_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('a_raport/RAPORT_doc', $data);
    }
}
