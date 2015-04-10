<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
		
    }
	function getdata(){
		$query = $this->db->get('company')->result_array();
		return $query;
	}
	function login($data){
		
		$numrow = $this->db->get_where('company',$data)->num_rows();
		
		if($numrow==0)
		{
			return false;
		}else{
			$email=$data['email'];
			$this->db->select("*");

			$data = $this->db->get_where('company', array('email' => $email))->row_array();
			
			return $data;
		}	
	}
	function insertnewcompany($newdata){
			$this->db->insert('company', $newdata); 	
			return true;
	}
	function updatenewcompany($newdata){
			$this->db->where('id', $newdata['id']);
			$this->db->update('company', $newdata); 
			return true;
	}
	function deletecompany($id){
			$this->db->delete('company', array('id' => $id));
			return true;
		}
	function setsession($sessiondata){
			
			$insert=array("session_id"=>$sessiondata['session_id']);
			$email=array("email"=>$sessiondata['email']);
			$this->db->update('company', $insert, $email);
			return true;
	}
}