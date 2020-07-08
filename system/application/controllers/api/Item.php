<?php
   
require APPPATH . 'libraries/REST_Controller.php';
  
// echo APPPATH . 'libraries/REST_Controller.php';

class Item extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->database();
    }
       
   
    public function index_post()
    {
        $input = urldecode($this->input->post('url_value'));

        $this->db->where('url',$input);
        $result=$this->db->get('url_shorten')->row();
        
        if(!empty($result))
        {
            $short_code=$result->short_code;

        }
        else
        {
            $short_code = $this->generateUniqueID();
            
            $time=time();
            $current_datetime=gmdate('Y-m-d H:i:s', $time);

            $data=array(

                'url'=>$input,
                'short_code'=>$short_code,
                'hits'=>0,
                'added_date'=>$current_datetime,
            );

            if($this->db->insert('url_shorten',$data))
            {
                $short_code= $short_code;
            }
            else
            {
                die("Unknown Error Occured");
            }

        }


        $this->response(['ok',$short_code], REST_Controller::HTTP_OK);
    } 


        function generateUniqueID(){
            global $conn; 
            $token = substr(md5(uniqid(rand(), true)),0,6); // creates a 6 digit unique short id


            $this->db->where('short_code',$token);
            $result=$this->db->get('url_shorten')->row();


            if (!empty($result)) 
            {
            generateUniqueID();
            } 
            else 
            {
            return $token;
            }
        }
     
	
}