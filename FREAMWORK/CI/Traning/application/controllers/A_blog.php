<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class A_blog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('A_blog_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', true));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'a_blog/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'a_blog/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'a_blog/index.html';
            $config['first_url'] = base_url() . 'a_blog/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = true;
        $config['total_rows'] = $this->A_blog_model->total_rows($q);
        $a_blog = $this->A_blog_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'a_blog_data' => $a_blog,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('a_blog/BLOG_list', $data);
    }

    public function read($id)
    {
        $row = $this->A_blog_model->get_by_id($id);
        if ($row) {
            $data = array(
        'ID_BLOG' => $row->ID_BLOG,
        'LINK_MATERI' => $row->LINK_MATERI,
        );
            $this->load->view('a_blog/BLOG_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('a_blog'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('a_blog/create_action'),
        'ID_BLOG' => set_value('ID_BLOG'),
        'LINK_MATERI' => set_value('LINK_MATERI'),
    );
        $this->load->view('a_blog/BLOG_form', $data);
    }
    
    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {
            $data = array(
        'LINK_MATERI' => $this->input->post('LINK_MATERI', true),
        );

            $this->A_blog_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('a_blog'));
        }
    }
    
    public function update($id)
    {
        $row = $this->A_blog_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('a_blog/update_action'),
        'ID_BLOG' => set_value('ID_BLOG', $row->ID_BLOG),
        'LINK_MATERI' => set_value('LINK_MATERI', $row->LINK_MATERI),
        );
            $this->load->view('a_blog/BLOG_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('a_blog'));
        }
    }
    
    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->update($this->input->post('ID_BLOG', true));
        } else {
            $data = array(
        'LINK_MATERI' => $this->input->post('LINK_MATERI', true),
        );

            $this->A_blog_model->update($this->input->post('ID_BLOG', true), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('a_blog'));
        }
    }
    
    public function delete($id)
    {
        $row = $this->A_blog_model->get_by_id($id);

        if ($row) {
            $this->A_blog_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('a_blog'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('a_blog'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('LINK_MATERI', 'link materi', 'trim|required');

        $this->form_validation->set_rules('ID_BLOG', 'ID_BLOG', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "BLOG.xls";
        $judul = "BLOG";
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
        xlsWriteLabel($tablehead, $kolomhead++, "LINK MATERI");

        foreach ($this->A_blog_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->LINK_MATERI);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=BLOG.doc");

        $data = array(
            'BLOG_data' => $this->A_blog_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('a_blog/BLOG_doc', $data);
    }
}
