<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class A_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('A_user_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', true));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'a_user/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'a_user/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'a_user/index.html';
            $config['first_url'] = base_url() . 'a_user/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = true;
        $config['total_rows'] = $this->A_user_model->total_rows($q);
        $a_user = $this->A_user_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'a_user_data' => $a_user,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('a_user/USER_list', $data);
    }

    public function read($id)
    {
        $row = $this->A_user_model->get_by_id($id);
        if ($row) {
            $data = array(
        'ID_USER' => $row->ID_USER,
        'NAMA_USER' => $row->NAMA_USER,
        'EMAIL_USER' => $row->EMAIL_USER,
        'PASWD_USER' => $row->PASWD_USER,
        'ROLE_ID' => $row->ROLE_ID,
        'ID_TRAINS' => $row->ID_TRAINS,
        );
            $this->load->view('a_user/USER_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('a_user'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('a_user/create_action'),
        'ID_USER' => set_value('ID_USER'),
        'NAMA_USER' => set_value('NAMA_USER'),
        'EMAIL_USER' => set_value('EMAIL_USER'),
        'PASWD_USER' => set_value('PASWD_USER'),
        'ROLE_ID' => set_value('ROLE_ID'),
        'ID_TRAINS' => set_value('ID_TRAINS'),
    );
        $this->load->view('a_user/USER_form', $data);
    }
    
    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {
            $data = array(
        'NAMA_USER' => $this->input->post('NAMA_USER', true),
        'EMAIL_USER' => $this->input->post('EMAIL_USER', true),
        'PASWD_USER' => $this->input->post('PASWD_USER', true),
        'ROLE_ID' => $this->input->post('ROLE_ID', true),
        'ID_TRAINS' => $this->input->post('ID_TRAINS', true),
        );

            $this->A_user_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('a_user'));
        }
    }
    
    public function update($id)
    {
        $row = $this->A_user_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('a_user/update_action'),
        'ID_USER' => set_value('ID_USER', $row->ID_USER),
        'NAMA_USER' => set_value('NAMA_USER', $row->NAMA_USER),
        'EMAIL_USER' => set_value('EMAIL_USER', $row->EMAIL_USER),
        'PASWD_USER' => set_value('PASWD_USER', $row->PASWD_USER),
        'ROLE_ID' => set_value('ROLE_ID', $row->ROLE_ID),
        'ID_TRAINS' => set_value('ID_TRAINS', $row->ID_TRAINS),
        );
            $this->load->view('a_user/USER_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('a_user'));
        }
    }
    
    public function update_action()
    {
        var_dump($_POST);
        die;
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->update($this->input->post('ID_USER', true));
        } else {
            $data = array(
        'NAMA_USER' => $this->input->post('NAMA_USER', true),
        'EMAIL_USER' => $this->input->post('EMAIL_USER', true),
        'PASWD_USER' => $this->input->post('PASWD_USER', true),
        'ROLE_ID' => $this->input->post('ROLE_ID', true),
        'ID_TRAINS' => $this->input->post('ID_TRAINS', true),
        );

            $this->A_user_model->update($this->input->post('ID_USER', true), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('a_user'));
        }
    }
    
    public function delete($id)
    {
        $row = $this->A_user_model->get_by_id($id);

        if ($row) {
            $this->A_user_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('a_user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('a_user'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('NAMA_USER', 'nama user', 'trim|required');
        $this->form_validation->set_rules('EMAIL_USER', 'email user', 'trim|required');
        $this->form_validation->set_rules('PASWD_USER', 'paswd user', 'trim|required');
        $this->form_validation->set_rules('ROLE_ID', 'role id', 'trim|required');
        $this->form_validation->set_rules('ID_TRAINS', 'id trains', 'trim|required');

        $this->form_validation->set_rules('ID_USER', 'ID_USER', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "USER.xls";
        $judul = "USER";
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
        xlsWriteLabel($tablehead, $kolomhead++, "NAMA USER");
        xlsWriteLabel($tablehead, $kolomhead++, "EMAIL USER");
        xlsWriteLabel($tablehead, $kolomhead++, "PASWD USER");
        xlsWriteLabel($tablehead, $kolomhead++, "ROLE ID");
        xlsWriteLabel($tablehead, $kolomhead++, "ID TRAINS");

        foreach ($this->A_user_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->NAMA_USER);
            xlsWriteLabel($tablebody, $kolombody++, $data->EMAIL_USER);
            xlsWriteLabel($tablebody, $kolombody++, $data->PASWD_USER);
            xlsWriteNumber($tablebody, $kolombody++, $data->ROLE_ID);
            xlsWriteNumber($tablebody, $kolombody++, $data->ID_TRAINS);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=USER.doc");

        $data = array(
            'USER_data' => $this->A_user_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('a_user/USER_doc', $data);
    }
}
