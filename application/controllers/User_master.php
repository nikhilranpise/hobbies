<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_master extends MY_Controller {

	    function __construct()
	    {
	        parent::__construct();        
	        $this->load->model('User_master_model');
	    }

        public function index()
        {     
            $data['master_class'] = "Dashboard";
           	//$data['active_class'] = "user_master";
           	
           	$data['headerassets'] = array(
    			'css' => array(
    			    'assets/css/dashboard.css',
    			    ),
    			'js' => array(
    			    
    				'assets/plugins/datatables/plugin.js',
    				 'assets/js/dashboard.js',
    			)
    		);

            $sess = $this->session->userdata('user_id');
            $user_id = $sess->user_id;
    		
    		$data['user_master'] = $this->User_master_model->get_all_hobbies($user_id);
           	$this->load->view('header_datatable',$data);
            $this->load->view('nav',$data);
            $this->load->view('Users/index',$data);             
                
        }

        public function hobbies()
        {
            $data['master_class'] = "hobbies";
            //$data['active_class'] = "user_master";
            
            $data['headerassets'] = array(
                'css' => array(
                    'assets/css/dashboard.css',
                    ),
                'js' => array(
                    
                    'assets/plugins/datatables/plugin.js',
                     'assets/js/dashboard.js',
                )
            );
            $sess = $this->session->userdata('user_id');
            //print_r($sess->user_id);exit();
            $user_id = $sess->user_id;
            $data['hobbies'] = $this->User_master_model->get_hobbies($user_id);
            $this->load->view('header_datatable',$data);
            $this->load->view('nav',$data);
            $this->load->view('Users/hobbies',$data);
        } 

        public function hobby_add()
        {
            $sess = $this->session->userdata('user_id');
            $user_id = $sess->user_id;

            $post = $this->input->post();

            $array = array(
                'hobby_name' => $post['hobby_name'],
                'user_id' => $user_id
            );
            $insert = $this->User_master_model->save_hobby($array);
            $this->session->set_flashdata('flsh_msg', '<div class="alert alert-success text-center">Hobby Added Successfully</div>');
            redirect('Hobbies');
        }

        public function hobby_edit()
        {
            $post = $this->input->post();
            $id = $post['id'];
            $array = array(
                'hobby_name' => $post['hobby_name'],
            );
            $insert = $this->User_master_model->update_hobby($array,$id);
            $this->session->set_flashdata('flsh_msg', '<div class="alert alert-success text-center">Hobby Updated Successfully</div>');
            redirect('Hobbies');
        }

        public function hobby_delete($id)
        {
            $delete = $this->User_master_model->delete_hobby($id);
            $this->session->set_flashdata('flsh_msg', '<div class="alert alert-danger text-center">Hobby Deleted Successfully</div>');
            redirect('Hobbies');
        }

        public function sub_hobbies()
        {
            $data['master_class'] = "sub_hobbies";
            //$data['active_class'] = "user_master";
            
            $data['headerassets'] = array(
                'css' => array(
                    'assets/css/dashboard.css',
                    ),
                'js' => array(
                    
                    'assets/plugins/datatables/plugin.js',
                     'assets/js/dashboard.js',
                )
            );
            $sess = $this->session->userdata('user_id');
            $user_id = $sess->user_id;
            $data['subhobbies'] = $this->User_master_model->get_subhobbies($user_id);
            $data['hobbies'] = $this->User_master_model->get_hobbies($user_id);
            $this->load->view('header_datatable',$data);
            $this->load->view('nav',$data);
            $this->load->view('Users/sub_hobbies',$data);
        }

        public function sub_hobby_add()
        {
            $post = $this->input->post();
            $sess = $this->session->userdata('user_id');
            $user_id = $sess->user_id;
            $array = array(
                'hobby_id' => $post['hobby_id'],
                'user_id' => $user_id,
                'sub_hobby_name' => $post['sub_hobby_name'],
            );

            $insert = $this->User_master_model->insert_subhobby($array);
            $this->session->set_flashdata('flsh_msg', '<div class="alert alert-success text-center">Sub Hobby Added Successfully</div>');
            redirect('subHobbies');
        }

        public function sub_hobby_edit()
        {
            $post = $this->input->post();
            $id = $post['id'];
            $sess = $this->session->userdata('user_id');
            $user_id = $sess->user_id;
            $array = array(
                'hobby_id' => $post['hobby_id'],
                'user_id' => $user_id,
                'sub_hobby_name' => $post['sub_hobby_name'],
            );

            $update = $this->User_master_model->update_sub_hobby($array,$id);
            $this->session->set_flashdata('flsh_msg', '<div class="alert alert-success text-center">Sub Hobby Updated Successfully</div>');
            redirect('subHobbies');
        }

        public function sub_hobby_delete($id)
        {
            $delete = $this->User_master_model->delete_sub_hobby($id);
            $this->session->set_flashdata('flsh_msg', '<div class="alert alert-danger text-center">Sub Hobby Deleted Successfully</div>');
            redirect('subHobbies');
        }
    


                       
}