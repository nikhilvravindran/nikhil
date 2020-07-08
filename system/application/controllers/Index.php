<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {


	public function __construct()
	{
	parent::__construct();
	$this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->library('session');
        $this->load->model('index_model');
	}

	public function index()
	{

        $data['urls']=$this->db->get('url_shorten')->result();
	    $this->load->view('index_url',$data);
	}

        public function shorten_url()
        {

        $url_data=urlencode($_POST["url_value"]);

        $url = 'https://intrusive-airships.000webhostapp.com/api/Item';
   
        $ch = curl_init($url);
   
        $data = ['url_value'=>$url_data];
   
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
        $result = curl_exec($ch);
          
        curl_close($ch);

        $res['urldata']=json_decode($result); 

        redirect('/');
           
        }

    public function urlredirect( $alias )
    {
        $url_data = $this->index_model->get_data( $alias );
        
        if($url_data){
            $this->index_model->add_hit($url_data->id);
            
            header('Location: ' . $url_data->url, true, 302);
            exit();
                   
        }
        
    }
    
    public function report()
    {
        $data['report'] = $this->index_model->get_report();
        
        if($data['report']){
           $this->load->view('report',$data);
                   
        }
        
    }
}
