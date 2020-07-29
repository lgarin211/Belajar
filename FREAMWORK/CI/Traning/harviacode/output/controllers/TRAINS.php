<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class TRAINS extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('TRAINS_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'trains/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'trains/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'trains/index.html';
            $config['first_url'] = base_url() . 'trains/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->TRAINS_model->total_rows($q);
        $trains = $this->TRAINS_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'trains_data' => $trains,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('trains/TRAINS_list', $data);
    }

    public function read($id) 
    {
        $row = $this->TRAINS_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID_TRAINS' => $row->ID_TRAINS,
		'ID_KELAS' => $row->ID_KELAS,
		'ID_RAPORT' => $row->ID_RAPORT,
		'ID_JOB' => $row->ID_JOB,
	    );
            $this->load->view('trains/TRAINS_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('trains'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('trains/create_action'),
	    'ID_TRAINS' => set_value('ID_TRAINS'),
	    'ID_KELAS' => set_value('ID_KELAS'),
	    'ID_RAPORT' => set_value('ID_RAPORT'),
	    'ID_JOB' => set_value('ID_JOB'),
	);
        $this->load->view('trains/TRAINS_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'ID_KELAS' => $this->input->post('ID_KELAS',TRUE),
		'ID_RAPORT' => $this->input->post('ID_RAPORT',TRUE),
		'ID_JOB' => $this->input->post('ID_JOB',TRUE),
	    );

            $this->TRAINS_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('trains'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->TRAINS_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('trains/update_action'),
		'ID_TRAINS' => set_value('ID_TRAINS', $row->ID_TRAINS),
		'ID_KELAS' => set_value('ID_KELAS', $row->ID_KELAS),
		'ID_RAPORT' => set_value('ID_RAPORT', $row->ID_RAPORT),
		'ID_JOB' => set_value('ID_JOB', $row->ID_JOB),
	    );
            $this->load->view('trains/TRAINS_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('trains'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_TRAINS', TRUE));
        } else {
            $data = array(
		'ID_KELAS' => $this->input->post('ID_KELAS',TRUE),
		'ID_RAPORT' => $this->input->post('ID_RAPORT',TRUE),
		'ID_JOB' => $this->input->post('ID_JOB',TRUE),
	    );

            $this->TRAINS_model->update($this->input->post('ID_TRAINS', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('trains'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->TRAINS_model->get_by_id($id);

        if ($row) {
            $this->TRAINS_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('trains'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('trains'));
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

}

/* End of file TRAINS.php */
/* Location: ./application/controllers/TRAINS.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-20 11:42:29 */
/* http://harviacode.com */