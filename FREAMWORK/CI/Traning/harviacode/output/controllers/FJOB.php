<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class FJOB extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('FJOB_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'fjob/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'fjob/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'fjob/index.html';
            $config['first_url'] = base_url() . 'fjob/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->FJOB_model->total_rows($q);
        $fjob = $this->FJOB_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'fjob_data' => $fjob,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('fjob/FJOB_list', $data);
    }

    public function read($id) 
    {
        $row = $this->FJOB_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID_JOB' => $row->ID_JOB,
		'ID_TUGAS' => $row->ID_TUGAS,
		'AT_TIME' => $row->AT_TIME,
		'SCRORE' => $row->SCRORE,
	    );
            $this->load->view('fjob/FJOB_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('fjob'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('fjob/create_action'),
	    'ID_JOB' => set_value('ID_JOB'),
	    'ID_TUGAS' => set_value('ID_TUGAS'),
	    'AT_TIME' => set_value('AT_TIME'),
	    'SCRORE' => set_value('SCRORE'),
	);
        $this->load->view('fjob/FJOB_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'ID_TUGAS' => $this->input->post('ID_TUGAS',TRUE),
		'AT_TIME' => $this->input->post('AT_TIME',TRUE),
		'SCRORE' => $this->input->post('SCRORE',TRUE),
	    );

            $this->FJOB_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('fjob'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->FJOB_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('fjob/update_action'),
		'ID_JOB' => set_value('ID_JOB', $row->ID_JOB),
		'ID_TUGAS' => set_value('ID_TUGAS', $row->ID_TUGAS),
		'AT_TIME' => set_value('AT_TIME', $row->AT_TIME),
		'SCRORE' => set_value('SCRORE', $row->SCRORE),
	    );
            $this->load->view('fjob/FJOB_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('fjob'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_JOB', TRUE));
        } else {
            $data = array(
		'ID_TUGAS' => $this->input->post('ID_TUGAS',TRUE),
		'AT_TIME' => $this->input->post('AT_TIME',TRUE),
		'SCRORE' => $this->input->post('SCRORE',TRUE),
	    );

            $this->FJOB_model->update($this->input->post('ID_JOB', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('fjob'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->FJOB_model->get_by_id($id);

        if ($row) {
            $this->FJOB_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('fjob'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('fjob'));
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

}

/* End of file FJOB.php */
/* Location: ./application/controllers/FJOB.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-20 11:42:29 */
/* http://harviacode.com */