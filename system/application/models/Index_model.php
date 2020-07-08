<?php

class Index_model extends CI_Model 
{




public function get_data($alias)
{

	$this->db->where('short_code',$alias);
	$result=$this->db->get('url_shorten')->row(); 
	return $result;
}

public function add_hit($id)
{

	$this->db->where('id',$id);
	$result=$this->db->get('url_shorten')->row(); 

	$hit=$result->hits+1;

	$data=array('hits'=>$hit);

	$this->db->where('id',$id);
	$this->db->update('url_shorten', $data);
	return true;
}

public function get_report()
{

    $this->db->where('added_date < DATE_SUB(NOW(), INTERVAL 1 HOUR)');
    $result=$this->db->get('url_shorten')->result();
    
    return $result;
}

}

?>