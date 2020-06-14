<?php
class MY_Controller extends CI_Controller{

	 public function __construct(){
                     	parent::__construct();
                     	$this->load->library('encrypt');  

	               if (! $this->session->userdata('user_id') ){ 
 		        redirect('');
	               }
 			}

}

class AD_Controller extends CI_Controller{

	 public function __construct(){
                     	parent::__construct();
                     	$this->load->library('encrypt');  

	               if (! $this->session->userdata('admin_id') ){ 
 		        redirect('admin_login');
	               }
 			}

}

// class CLIENT_Controller extends CI_Controller{

// 	 public function __construct(){
//                      	parent::__construct();

// 	               if (! $this->session->userdata('client_id') ) 
//  		        redirect('client');
//  			}

// }

?> 







