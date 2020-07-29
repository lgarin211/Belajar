<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class KELAS extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('KELAS_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kelas/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kelas/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kelas/index.html';
            $config['first_url'] = base_url() . 'kelas/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->KELAS_model->total_rows($q);
        $kelas = $this->KELAS_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kelas_data' => $kelas,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('kelas/KELAS_list', $data);
    }

    public function read($id) 
    {
        $row = $this->KELAS_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID_KELAS' => $row->ID_KELAS,
		'NAMA_KELAS' => $row->NAMA_KELAS,
		'ID_TRANING' => $row->ID_TRANING,
	    );
            $this->load->view('kelas/KELAS_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelas'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kelas/create_action'),
	    'ID_KELAS' => set_value('ID_KELAS'),
	    'NAMA_KELAS' => set_value('NAMA_KELAS'),
	    'ID_TRANING' => set_value('ID_TRANING'),
	);
        $this->load->view('kelas/KELAS_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'NAMA_KELAS' => $this->input->post('NAMA_KELAS',TRUE),
		'ID_TRANING' => $this->input->post('ID_TRANING',TRUE),
	    );

            $this->KELAS_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kelas'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->KELAS_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kelas/update_action'),
		'ID_KELAS' => set_value('ID_KELAS', $row->ID_KELAS),
		'NAMA_KELAS' => set_value('NAMA_KELAS', $row->NAMA_KELAS),
		'ID_TRANING' => set_value('ID_TRANING', $row->ID_TRANING),
	    );
            $this->load->view('kelas/KELAS_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_KELAS', TRUE));
        } else {
            $data = array(
		'NAMA_KELAS' => $this->input->post('NAMA_KELAS',TRUE),
		'ID_TRANING' => $this->input->post('ID_TRANING',TRUE),
	    );

            $this->KELAS_model->update($this->input->post('ID_KELAS', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kelas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->KELAS_model->get_by_id($id);

        if ($row) {
            $this->KELAS_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kelas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelas'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('NAMA_KELAS', 'nama kelas', 'trim|required');
	$this->form_validation->set_rules('ID_TRANING', 'id traning', 'trim|required');

	$this->form_validation->set_rules('ID_KELAS', 'ID_KELAS', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file KELAS.php */
/* Location: ./application/controllers/KELAS.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-18 18:51:17 */
/* http://harviacode.com */