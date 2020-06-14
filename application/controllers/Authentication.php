<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authentication extends CI_Controller {
    
    public function index()
    {
        $this->load->view('login');
        $this->load->library('session');
    }
    
    public function validate()
    {                                 
        if ($_POST) { 
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email','email','required');
        $this->form_validation->set_rules('password','password','required');
        
        if($this->form_validation->run() == TRUE)
        {
        $username=$this->input->post('email');
        $password=$this->input->post('password');
        $login_id=$this->Authenticationmodal->check($username,$password);
        //print_r($login_id);exit();
        if ($login_id) 
        {
        //$this->session->sess_expiration='60';   
        $this->session->set_userdata('user_id',$login_id);
        redirect('myHobbies'); 
        }else
        {
        $this->session->set_flashdata('login_failed','Invalid Username and Pasword');
        return redirect('Authentication');
        }
        
        }else{
        $this->load->view('login');
        }
        
        }
    } 


    public function sign_up()
    {
        $this->load->view('sign_up');
    }
    
    
    
    public function logout()
    { 
        $this->session->unset_userdata('user_id');
        redirect('');
    
    }

    public function admin_login()
    {
        $this->load->view('Admin/login');
    }

    public function check_admin()
    {
        if ($_POST) { 
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email','email','required');
        $this->form_validation->set_rules('password','password','required');
        
        if($this->form_validation->run() == TRUE)
        {
        $username=$this->input->post('email');
        $password=$this->input->post('password');
        $login_id=$this->Authenticationmodal->check_admin($username,$password);
        //print_r($login_id);exit();
        if ($login_id) 
        {
        //$this->session->sess_expiration='60';   
        $this->session->set_userdata('admin_id',$login_id);
        redirect('adminDashboard'); 
        }else
        {
        $this->session->set_flashdata('login_failed','Invalid Username and Pasword');
        return redirect('Admin');
        }
        
        }else{
        $this->load->view('Admin/login');
        }
        
        }
    }

    public function admin_logout()
    { 
        $this->session->unset_userdata('admin_id');
        redirect('admin_login');
    
    }

    public function save_sign_up()
    {
        $post = $this->input->post();

        $array = array(
            'name' => $post['name'],
            'email' => $post['email'],
            'password' => $post['password'],
        );

        $insert = $this->Authenticationmodal->insert_user($array);
        redirect('');
    }
    
    /*function PwdHash($pwd, $salt = null)
    {
        if ($salt === null){
            $salt = substr(md5(uniqid(rand(), true)), 0, SALT_LENGTH);
    }
        else{
            $salt = substr($salt, 0, SALT_LENGTH);
        }
        return $salt . sha1($pwd . $salt);
    }*/

}	
