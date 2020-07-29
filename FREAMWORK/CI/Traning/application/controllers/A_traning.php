<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class A_traning extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('A_traning_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'a_traning/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'a_traning/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'a_traning/index.html';
            $config['first_url'] = base_url() . 'a_traning/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->A_traning_model->total_rows($q);
        $a_traning = $this->A_traning_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'a_traning_data' => $a_traning,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('a_traning/TRANING_list', $data);
    }

    public function read($id) 
    {
        $row = $this->A_traning_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID_TRANING' => $row->ID_TRANING,
		'TOPIK_TRANING' => $row->TOPIK_TRANING,
		'ID_BLOG' => $row->ID_BLOG,
	    );
            $this->load->view('a_traning/TRANING_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('a_traning'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('a_traning/create_action'),
	    'ID_TRANING' => set_value('ID_TRANING'),
	    'TOPIK_TRANING' => set_value('TOPIK_TRANING'),
	    'ID_BLOG' => set_value('ID_BLOG'),
	);
        $this->load->view('a_traning/TRANING_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'TOPIK_TRANING' => $this->input->post('TOPIK_TRANING',TRUE),
		'ID_BLOG' => $this->input->post('ID_BLOG',TRUE),
	    );

            $this->A_traning_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('a_traning'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->A_traning_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('a_traning/update_action'),
		'ID_TRANING' => set_value('ID_TRANING', $row->ID_TRANING),
		'TOPIK_TRANING' => set_value('TOPIK_TRANING', $row->TOPIK_TRANING),
		'ID_BLOG' => set_value('ID_BLOG', $row->ID_BLOG),
	    );
            $this->load->view('a_traning/TRANING_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('a_traning'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_TRANING', TRUE));
        } else {
            $data = array(
		'TOPIK_TRANING' => $this->input->post('TOPIK_TRANING',TRUE),
		'ID_BLOG' => $this->input->post('ID_BLOG',TRUE),
	    );

            $this->A_traning_model->update($this->input->post('ID_TRANING', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('a_traning'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->A_traning_model->get_by_id($id);

        if ($row) {
            $this->A_traning_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('a_traning'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('a_traning'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('TOPIK_TRANING', 'topik traning', 'trim|required');
	$this->form_validation->set_rules('ID_BLOG', 'id blog', 'trim|required');

	$this->form_validation->set_rules('ID_TRANING', 'ID_TRANING', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "TRANING.xls";
        $judul = "TRANING";
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
	xlsWriteLabel($tablehead, $kolomhead++, "TOPIK TRANING");
	xlsWriteLabel($tablehead, $kolomhead++, "ID BLOG");

	foreach ($this->A_traning_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->TOPIK_TRANING);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ID_BLOG);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=TRANING.doc");

        $data = array(
            'TRANING_data' => $this->A_traning_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('a_traning/TRANING_doc',$data);
    }

}
