<?php
if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Excel_manage  extends CI_Controller
{

function __Construct(){
        parent::__Construct();
        $this->load->model('Excel_model'); 
            $this->load->helper(array('form', 'url'));
            $this->load->helper('download');
            $this->load->library('PHPReport');
           // $this->load->library('csvimport');
        
        $this->no_cache();
        if( ! $this->session->userdata('user_id') )
        {             
            $error = 'ID doesn exist';         
      }
        }
  
  protected function no_cache()
  {
  header('Cache-Control: no-store, no-cache, must-revalidate');
  header('Cache-Control: post-check=0, pre-check=0',false);
  header('Pragma: no-cache'); 
  }
 public function index(){
   
        // get data from databse
        $data = $this->Excel_model->get_stocks();
        
        
        $template = 'Myexcel.csv';
        //set absolute path to directory with template files
        $templateDir = __DIR__ . "/../controllers/";
        
        //set config for report
        $config = array(
        'template' => $template,
        'templateDir' => $templateDir
        );
        
        
        //load template
        $R = new PHPReport($config);
        
        $R->load(array(
              'NEWS_ID' => 'news_paper',
              'repeat' => TRUE,
              'data' => $data  
          )
        );
        
        // define output directoy 
        $output_file_dir = "/tmp/";
        
        
        $output_file_excel = $output_file_dir  . "Myexcel.csv";
        //download excel sheet with data in /tmp folder
        $result = $R->render('excel', $output_file_excel);
    }
    
    public function upload_stock()
    {
        $config =  array(
        'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/upload/stock_data/",
        'upload_url'      => base_url()."upload/stock_data/",
        'allowed_types'   => "*",
        'overwrite'       => TRUE 
        );
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        
        $this->upload->do_upload();				
        $uploadeddata=$this->upload->data();
        
        if($this->upload->do_upload() == True)
        $attachdpr=$config['upload_url'].$uploadeddata['file_name'];
        else
        $attachdpr='NA';
        
        
        if($this->upload->do_upload())
        {
            $file_data = $this->upload->data();
            
            //print_r($file_data); exit();
            $file_path ='upload/stock_data/'.$file_data['file_name'];
            //print_r($file_path); exit();
            $this->load->library('csvimport');
            if($this->csvimport->get_array($file_path))
            {
                $csv_array = $this->csvimport->get_array($file_path);
                //print_r($csv_array);exit();
                foreach ($csv_array as $row=>$v) 
                {
                    //foreach($value as $k=>$v){
                    
                    $product_code = $v['product_code'];
                    //print_r($product_code);exit();
                    $check = $this->Excel_model->check_product_code($product_code);
                    //print_r($check);exit();
                    $stock_id = $check->stock_id;
                    if(empty($check)) {
                    
                        $insert_main = array(
                            'item_given_by'=> $v['item_given_by'],
                            'batch_no'=>$v['batch_no'],
                            'product_category' =>$v['product_category'] ,
                            'product_code'=>$v['product_code'] ,
                            'quantity'=>$v['quantity'],
                            'gross_weight'=>$v['gross_weigh'] ,
                            'net_weight'=>$v['et_weigh'],
                            'fg_weight'=>$v['fg_weigh'],
                            'rate'=>$v['ate'] ,
                            'amount'=>$v['amou'] ,
                            'handling_rate'=>$v['handling_rate'] ,
                            'handling_amount'=>$v['handling_amou'] ,
                            'making_rate'=>$v['making_rate'] ,
                            'making_amount'=>$v['making_amou'] ,
                            'certificate_amount'=>$v['certificate_amou'] ,
                            'barcode'=>$v['barcode'] ,
                            );
                        $insert_id = $this->Excel_model->insert_csv($insert_main);
                        //print_r($inserted); exit();
                        $diamond_array = array(
                            'stock_id' => $insert_id,
                            'diamond_shape' => $v['diamond_shape'],
                            'diamond_size' => $v['diamond_size'],
                            'diamond_quantity' => $v['diamond_quantity'],
                            'diamond_pieces' => $v['diamond_pieces'],
                            'diamond_weight' => $v['diamond_weigh'],
                            'diamond_rate' => $v['diamond_rate'],
                            'diamond_amount' => $v['diamond_amou'],
                            );
                        $insert_diamond = $this->Excel_model->insert_diamond($diamond_array);
                        $stone_array = array(
                            'stock_id' => $insert_id,
                            'stone_pieces' => $v['stone_pieces'],
                            'stone_weight' => $v['stone_weigh'],
                            'stone_rate' => $v['stone_rate'],
                            'stone_amount' => $v['stone_amou'],
                            );
                        $insert_stone = $this->Excel_model->insert_stone($stone_array);
                    }
                    
                    if(!empty($check)){
                        //$product_code = $v['product_code'];
                        //$stock = $this->Excel_model->get_stock_by_product($product_code);
                        //$stock_id = $stock->stock_id;
                        if( !empty($v['diamond_shape']) || !empty($v['diamond_size']) || !empty($v['diamond_quantity']) || !empty($v['diamond_pieces']) || !empty($v['diamond_weigh']) || !empty($v['diamond_rate']) || !empty($v['diamond_amou'])){
                            $diamond_array = array(
                            'stock_id' => $stock_id,
                            'diamond_shape' => $v['diamond_shape'],
                            'diamond_size' => $v['diamond_size'],
                            'diamond_quantity' => $v['diamond_quantity'],
                            'diamond_pieces' => $v['diamond_pieces'],
                            'diamond_weight' => $v['diamond_weigh'],
                            'diamond_rate' => $v['diamond_rate'],
                            'diamond_amount' => $v['diamond_amou'],
                            );
                            $insert_diamond = $this->Excel_model->insert_diamond($diamond_array);
                        }
                        if( !empty($v['stone_pieces']) || !empty($v['stone_weigh']) || !empty($v['stone_rate']) || !empty($v['stone_amou'])){
                            $stone_array = array(
                            'stock_id' => $stock_id,
                            'stone_pieces' => $v['stone_pieces'],
                            'stone_weight' => $v['stone_weigh'],
                            'stone_rate' => $v['stone_rate'],
                            'stone_amount' => $v['stone_amou'],
                            );
                        $insert_stone = $this->Excel_model->insert_stone($stone_array);
                        }
                    }
                    
                    $date = date('Y-m-d');
                    $sess = $this->session->userdata('admin_id');
                    $username = $sess->username;
                    $transport_array = array(
                        'person' => $v['item_given_by'],
                        'product_code' => $v['product_code'],
                        'quantity' => '1',
                        'date' => $date,
                        'status' => 'Inward',
                        'username' => $username,
                        
                        );
                    $insert_transport = $this->Excel_model->insert_transport($transport_array);
                    
                    	
                
                
                }
                
                $this->session->set_flashdata('flsh_msg', '<div class="alert alert-success text-center">Stock added successfully</div>');
                redirect('stock');
            
            
            }
        
        }
    }

    

    
     
     
    

    
    
    
     
     
 
}