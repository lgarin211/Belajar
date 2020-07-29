<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class A_trains extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('A_trains_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', true));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'a_trains/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'a_trains/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'a_trains/index.html';
            $config['first_url'] = base_url() . 'a_trains/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = true;
        $config['total_rows'] = $this->A_trains_model->total_rows($q);
        $a_trains = $this->A_trains_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'a_trains_data' => $a_trains,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('a_trains/TRAINS_list', $data);
    }

    public function read($id)
    {
        $row = $this->A_trains_model->get_by_id($id);
        if ($row) {
            $data = array(
        'ID_TRAINS' => $row->ID_TRAINS,
        'ID_KELAS' => $row->ID_KELAS,
        'ID_RAPORT' => $row->ID_RAPORT,
        'ID_JOB' => $row->ID_JOB,
        );
            $this->load->view('a_trains/TRAINS_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('a_trains'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('a_trains/create_action'),
        'ID_TRAINS' => set_value('ID_TRAINS'),
        'ID_KELAS' => set_value('ID_KELAS'),
        'ID_RAPORT' => set_value('ID_RAPORT'),
        'ID_JOB' => set_value('ID_JOB'),
    );
        $this->load->view('a_trains/TRAINS_form', $data);
    }
    
    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {
            $data = array(
        'ID_KELAS' => $this->input->post('ID_KELAS', true),
        'ID_RAPORT' => $this->input->post('ID_RAPORT', true),
        'ID_JOB' => $this->input->post('ID_JOB', true),
        );

            $this->A_trains_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('a_trains'));
        }
    }
    
    public function update($id)
    {
        $row = $this->A_trains_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('a_trains/update_action'),
        'ID_TRAINS' => set_value('ID_TRAINS', $row->ID_TRAINS),
        'ID_KELAS' => set_value('ID_KELAS', $row->ID_KELAS),
        'ID_RAPORT' => set_value('ID_RAPORT', $row->ID_RAPORT),
        'ID_JOB' => set_value('ID_JOB', $row->ID_JOB),
        );
            $this->load->view('a_trains/TRAINS_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('a_trains'));
        }
    }
    
    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->update($this->input->post('ID_TRAINS', true));
        } else {
            $data = array(
        'ID_KELAS' => $this->input->post('ID_KELAS', true),
        'ID_RAPORT' => $this->input->post('ID_RAPORT', true),
        'ID_JOB' => $this->input->post('ID_JOB', true),
        );

            $this->A_trains_model->update($this->input->post('ID_TRAINS', true), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('a_trains'));
        }
    }
    
    public function delete($id)
    {
        $row = $this->A_trains_model->get_by_id($id);

        if ($row) {
            $this->A_trains_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('a_trains'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('a_trains'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('ID_KELAS', 'id kelas', 'trim|required');
        $this->form_validation->set_rules('ID_RAPORT', 'id raport', 'trim|required');
        $this->form_validation->set_rules('ID_JOB', 'id job', 'trim|required');

        $this->form_validation->set_rules('ID_TRAINS', 'ID_TRAINS', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "TRAINS.xls";
        $judul = "TRAINS";
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
        xlsWriteLabel($tablehead, $kolomhead++, "ID RAPORT");
        xlsWriteLabel($tablehead, $kolomhead++, "ID JOB");

        foreach ($this->A_trains_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteNumber($tablebody, $kolombody++, $data->ID_KELAS);
            xlsWriteNumber($tablebody, $kolombody++, $data->ID_RAPORT);
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
        header("Content-Disposition: attachment;Filename=TRAINS.doc");

        $data = array(
            'TRAINS_data' => $this->A_trains_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('a_trains/TRAINS_doc', $data);
    }
}
