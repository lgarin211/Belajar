<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'user/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'user/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'user/index.html';
            $config['first_url'] = base_url() . 'user/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->User_model->total_rows($q);
        $user = $this->User_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'user_data' => $user,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('user/USER_list', $data);
    }

    public function read($id) 
    {
        $row = $this->User_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID_USER' => $row->ID_USER,
		'NAMA_USER' => $row->NAMA_USER,
		'EMAIL_USER' => $row->EMAIL_USER,
		'PASWD_USER' => $row->PASWD_USER,
		'ROLE_ID' => $row->ROLE_ID,
		'ID_TRAINS' => $row->ID_TRAINS,
	    );
            $this->load->view('user/USER_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('user/create_action'),
	    'ID_USER' => set_value('ID_USER'),
	    'NAMA_USER' => set_value('NAMA_USER'),
	    'EMAIL_USER' => set_value('EMAIL_USER'),
	    'PASWD_USER' => set_value('PASWD_USER'),
	    'ROLE_ID' => set_value('ROLE_ID'),
	    'ID_TRAINS' => set_value('ID_TRAINS'),
	);
        $this->load->view('user/USER_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'NAMA_USER' => $this->input->post('NAMA_USER',TRUE),
		'EMAIL_USER' => $this->input->post('EMAIL_USER',TRUE),
		'PASWD_USER' => $this->input->post('PASWD_USER',TRUE),
		'ROLE_ID' => $this->input->post('ROLE_ID',TRUE),
		'ID_TRAINS' => $this->input->post('ID_TRAINS',TRUE),
	    );

            $this->User_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user/update_action'),
		'ID_USER' => set_value('ID_USER', $row->ID_USER),
		'NAMA_USER' => set_value('NAMA_USER', $row->NAMA_USER),
		'EMAIL_USER' => set_value('EMAIL_USER', $row->EMAIL_USER),
		'PASWD_USER' => set_value('PASWD_USER', $row->PASWD_USER),
		'ROLE_ID' => set_value('ROLE_ID', $row->ROLE_ID),
		'ID_TRAINS' => set_value('ID_TRAINS', $row->ID_TRAINS),
	    );
            $this->load->view('user/USER_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_USER', TRUE));
        } else {
            $data = array(
		'NAMA_USER' => $this->input->post('NAMA_USER',TRUE),
		'EMAIL_USER' => $this->input->post('EMAIL_USER',TRUE),
		'PASWD_USER' => $this->input->post('PASWD_USER',TRUE),
		'ROLE_ID' => $this->input->post('ROLE_ID',TRUE),
		'ID_TRAINS' => $this->input->post('ID_TRAINS',TRUE),
	    );

            $this->User_model->update($this->input->post('ID_USER', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $this->User_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
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

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-17 19:54:43 */
/* http://harviacode.com */