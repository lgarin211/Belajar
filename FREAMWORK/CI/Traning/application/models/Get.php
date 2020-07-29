<?php
    class Get extends CI_Model
    {
        // public $title;
        // public $content;
        // public $date;

        public function GET_ALL()
        {
            $query = $this->db->get('USER');
            $num=$query->num_rows();
            return $query->result();
        }

        public function BUAT_DATA()
        {
            $this->NAMA_USER  = $_POST['NAME_USER']; // please read the below note
            $this->EMAIL_USER  = $_POST['EMAIL_USER'];
            $this->PASWD_USER  = $_POST['PASWD_USER'];
            $this->ROLE_ID  = $_POST['ROLE_ID'];
            $this->ID_TRAINS  = $_POST['ID_TRAINS'];
            $trains1=$_POST['ID_TRAINS'];
            $trains = array('ID_TRAINS'=>$trains1, 'ID_KELAS'=>null, 'ID_RAPORT'=>$trains1, 'ID_JOB'=>$trains1);
            $raport=array('ID_RAPORT'=>$trains1,'ID_JOB'=>$trains1);
            $fjob=array('ID_JOB'=>$trains1);
            
            $this->db->insert('USER', $this);
            $this->db->insert('TRAINS', $trains);
            $this->db->insert('FJOB', $fjob);
            $this->db->insert('RAPORT', $raport);
        }


        // public function update_entry()
        // {
        //     $this->title    = $_POST['title'];
        //     $this->content  = $_POST['content'];
        //     $this->date     = time();

        //     $this->db->update('entries', $this, array('id' => $_POST['id']));
        // }
        // public function try(Type $var = null)
        // {
        //     $query = $this->db->get('USER');
        //     return $query->result();
        // }
        
        public function set_news()
        {
            $this->load->helper('url');
        
            $slug = url_title($this->input->post('title'), 'dash', true);
        
            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'text' => $this->input->post('text')
            );
            var_dump($data);
            die;
            return $this->db->insert('news', $data);
        }
    }
