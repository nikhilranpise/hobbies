<?php 

class Admin extends AD_Controller {

	function __construct()
    {
        parent::__construct();        
        $this->load->model('Admin_model');
    }


    

    public function dashboard()
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
        $data['user_master'] = $this->Admin_model->get_all_users();
        //print_r($data['user_master']);exit();
    	$this->load->view('Admin/header_datatable',$data);
        $this->load->view('Admin/nav',$data);
    	$this->load->view("Admin/dashboard",$data);
    }

    public function hobbies_view($id)
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
    		
    		$data['user_master'] = $this->Admin_model->get_all_hobbies($id);
           	$this->load->view('Admin/header_datatable',$data);
            $this->load->view('Admin/nav',$data);
            $this->load->view('Admin/admin_hobbies',$data); 
    }

    
}


?>