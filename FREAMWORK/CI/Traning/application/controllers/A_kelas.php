<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class A_kelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('A_kelas_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', true));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'a_kelas/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'a_kelas/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'a_kelas/index.html';
            $config['first_url'] = base_url() . 'a_kelas/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = true;
        $config['total_rows'] = $this->A_kelas_model->total_rows($q);
        $a_kelas = $this->A_kelas_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'a_kelas_data' => $a_kelas,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('a_kelas/KELAS_list', $data);
    }

    public function read($id)
    {
        $row = $this->A_kelas_model->get_by_id($id);
        if ($row) {
            $data = array(
        'ID_KELAS' => $row->ID_KELAS,
        'NAMA_KELAS' => $row->NAMA_KELAS,
        'ID_TRANING' => $row->ID_TRANING,
        );
            $this->load->view('a_kelas/KELAS_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('a_kelas'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('a_kelas/create_action'),
        'ID_KELAS' => set_value('ID_KELAS'),
        'NAMA_KELAS' => set_value('NAMA_KELAS'),
        'ID_TRANING' => set_value('ID_TRANING'),
    );
        $this->load->view('a_kelas/KELAS_form', $data);
    }
    
    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {
            $data = array(
        'NAMA_KELAS' => $this->input->post('NAMA_KELAS', true),
        'ID_TRANING' => $this->input->post('ID_TRANING', true),
        );

            $this->A_kelas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('a_kelas'));
        }
    }
    
    public function update($id)
    {
        $row = $this->A_kelas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('a_kelas/update_action'),
        'ID_KELAS' => set_value('ID_KELAS', $row->ID_KELAS),
        'NAMA_KELAS' => set_value('NAMA_KELAS', $row->NAMA_KELAS),
        'ID_TRANING' => set_value('ID_TRANING', $row->ID_TRANING),
        );
            $this->load->view('a_kelas/KELAS_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('a_kelas'));
        }
    }
    
    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->update($this->input->post('ID_KELAS', true));
        } else {
            $data = array(
        'NAMA_KELAS' => $this->input->post('NAMA_KELAS', true),
        'ID_TRANING' => $this->input->post('ID_TRANING', true),
        );

            $this->A_kelas_model->update($this->input->post('ID_KELAS', true), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('a_kelas'));
        }
    }
    
    public function delete($id)
    {
        $row = $this->A_kelas_model->get_by_id($id);

        if ($row) {
            $this->A_kelas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('a_kelas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('a_kelas'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('NAMA_KELAS', 'nama kelas', 'trim|required');
        $this->form_validation->set_rules('ID_TRANING', 'id traning', 'trim|required');

        $this->form_validation->set_rules('ID_KELAS', 'ID_KELAS', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "KELAS.xls";
        $judul = "KELAS";
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
        xlsWriteLabel($tablehead, $kolomhead++, "NAMA KELAS");
        xlsWriteLabel($tablehead, $kolomhead++, "ID TRANING");

        foreach ($this->A_kelas_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->NAMA_KELAS);
            xlsWriteNumber($tablebody, $kolombody++, $data->ID_TRANING);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=KELAS.doc");

        $data = array(
            'KELAS_data' => $this->A_kelas_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('a_kelas/KELAS_doc', $data);
    }
}
