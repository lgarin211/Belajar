<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Blog extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Blog_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'blog/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'blog/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'blog/index.html';
            $config['first_url'] = base_url() . 'blog/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Blog_model->total_rows($q);
        $blog = $this->Blog_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'blog_data' => $blog,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('blog/BLOG_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Blog_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID_BLOG' => $row->ID_BLOG,
		'LINK_MATERI' => $row->LINK_MATERI,
	    );
            $this->load->view('blog/BLOG_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('blog'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('blog/create_action'),
	    'ID_BLOG' => set_value('ID_BLOG'),
	    'LINK_MATERI' => set_value('LINK_MATERI'),
	);
        $this->load->view('blog/BLOG_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'LINK_MATERI' => $this->input->post('LINK_MATERI',TRUE),
	    );

            $this->Blog_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('blog'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Blog_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('blog/update_action'),
		'ID_BLOG' => set_value('ID_BLOG', $row->ID_BLOG),
		'LINK_MATERI' => set_value('LINK_MATERI', $row->LINK_MATERI),
	    );
            $this->load->view('blog/BLOG_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('blog'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_BLOG', TRUE));
        } else {
            $data = array(
		'LINK_MATERI' => $this->input->post('LINK_MATERI',TRUE),
	    );

            $this->Blog_model->update($this->input->post('ID_BLOG', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('blog'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Blog_model->get_by_id($id);

        if ($row) {
            $this->Blog_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('blog'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('blog'));
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

	foreach ($this->Blog_model->get_all() as $data) {
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
            'BLOG_data' => $this->Blog_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('blog/BLOG_doc',$data);
    }

}

/* End of file Blog.php */
/* Location: ./application/controllers/Blog.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-17 19:53:17 */
/* http://harviacode.com */