<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class A_tugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('A_tugas_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', true));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'a_tugas/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'a_tugas/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'a_tugas/index.html';
            $config['first_url'] = base_url() . 'a_tugas/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = true;
        $config['total_rows'] = $this->A_tugas_model->total_rows($q);
        $a_tugas = $this->A_tugas_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'a_tugas_data' => $a_tugas,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('a_tugas/TUGAS_list', $data);
    }

    public function read($id)
    {
        $row = $this->A_tugas_model->get_by_id($id);
        if ($row) {
            $data = array(
        'ID_TUGAS' => $row->ID_TUGAS,
        'DATE_LINE' => $row->DATE_LINE,
        );
            $this->load->view('a_tugas/TUGAS_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('a_tugas'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('a_tugas/create_action'),
        'ID_TUGAS' => set_value('ID_TUGAS'),
        'DATE_LINE' => set_value('DATE_LINE'),
    );
        $this->load->view('a_tugas/TUGAS_form', $data);
    }
    
    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {
            $data = array(
        'DATE_LINE' => $this->input->post('DATE_LINE', true),
        );

            $this->A_tugas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('a_tugas'));
        }
    }
    
    public function update($id)
    {
        $row = $this->A_tugas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('a_tugas/update_action'),
        'ID_TUGAS' => set_value('ID_TUGAS', $row->ID_TUGAS),
        'DATE_LINE' => set_value('DATE_LINE', $row->DATE_LINE),
        );
            $this->load->view('a_tugas/TUGAS_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('a_tugas'));
        }
    }
    
    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->update($this->input->post('ID_TUGAS', true));
        } else {
            $data = array(
        'DATE_LINE' => $this->input->post('DATE_LINE', true),
        );

            $this->A_tugas_model->update($this->input->post('ID_TUGAS', true), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('a_tugas'));
        }
    }
    
    public function delete($id)
    {
        $row = $this->A_tugas_model->get_by_id($id);

        if ($row) {
            $this->A_tugas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('a_tugas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('a_tugas'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('DATE_LINE', 'date line', 'trim|required');

        $this->form_validation->set_rules('ID_TUGAS', 'ID_TUGAS', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "TUGAS.xls";
        $judul = "TUGAS";
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
        xlsWriteLabel($tablehead, $kolomhead++, "DATE LINE");

        foreach ($this->A_tugas_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->DATE_LINE);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=TUGAS.doc");

        $data = array(
            'TUGAS_data' => $this->A_tugas_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('a_tugas/TUGAS_doc', $data);
    }
}
