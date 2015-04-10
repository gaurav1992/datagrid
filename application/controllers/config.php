<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Config extends CI_Controller
{
 
    public function __construct()
    {
        parent::__construct();
		$this->load->model('user_model');
		$this->load->helper('gaurav_helper');
		
    }
	function index()
    {
		if(is_loogedin())
			{
				//echo $this->data['sessionId'];
				$this->load->view("simple");
				
			}
			else{$this->load->view("login");}
	}
	function Tenant(){
		
			if(is_loogedin()) //Checking logged in or not from helper 
			{
				//Create new 
			if($this->input->post("action")=="create"){
				$postdata=$this->input->post("data");
				$newdata=array(
					"Comapny_Name"=>$postdata["Comapny_Name"],
					"first_name"=>$postdata["first_name"],
					"last_name"=>$postdata["last_name"],
					"email"=>$postdata["email"],
					"password"=>$postdata["password"],
					"date"=>$postdata["date"]
				);
				if($this->user_model->insertnewcompany($newdata)){
				$source=$this->user_model->getdata();
				$data=array(
					"aaData"=>$source,
					"sessionId"=>$this->session->userdata('Dsessionid'),
					"tenantName"=>$this->input->post("Comapny_Name"),
					"NewInsert"=>"true",
					
				);
				echo json_encode($data);
				exit;
				}else{
					$data=array(
						"sessionId"=>$this->session->userdata('Dsessionid'),
						"tenantName"=>"Null",
						"NewInsert"=>"Fail"
					);
				echo json_encode($data);
				}
				
			}
			//update
			if($this->input->post("action")=="edit"){
				$postdata=$this->input->post("data");
				$newdata=array(
					"Comapny_Name"=>$postdata["Comapny_Name"],
					"first_name"=>$postdata["first_name"],
					"last_name"=>$postdata["last_name"],
					"email"=>$postdata["email"],
					"password"=>$postdata["password"],
					"date"=>$postdata["date"],
					"id"=>$this->input->post("id"),
				);
				if($this->user_model->updatenewcompany($newdata)){
				$data=array(
					"sessionId"=>$this->session->userdata('Dsessionid'),
					"tenantName"=>$this->input->post("Comapny_Name"),
					"Updated"=>"true"
				);
				echo json_encode($data);
				exit;
				}else{
					$data=array(
						"sessionId"=>$this->session->userdata('Dsessionid'),
						"tenantName"=>"Null",
						"Updated"=>"Fail"
					);
				echo json_encode($data);
				}
				
				
			}
			//Delete 
			if($this->input->post("action")=="remove"){
					$id=$this->input->post("id");
					
				
				if($this->user_model->deletecompany($id[0])){
				$data=array(
					"sessionId"=>$this->session->userdata('Dsessionid'),
					"tenantName"=>$this->input->post("Comapny_Name"),
					"Deleted"=>"true"
				);
				echo json_encode($data);
				exit;
				}else{
					$data=array(
						"sessionId"=>$this->session->userdata('Dsessionid'),
						"tenantName"=>"Null",
						"Deleted"=>"Fail"
					);
				echo json_encode($data);
				}
				
				
			}
			//else
			else{
				$source=$this->user_model->getdata();
				$data=array(
					"data"=>$source,
					"action"=>$this->input->post()
				);
				
				echo json_encode($data);
			}
			}else{$this->load->view("login");}
	}
	function edit(){
		$source=$this->input->post();
			$data=array(
				"data"=>$source,
			);
			
			echo json_encode($data);
	}
	function login(){
		
		if($this->input->post()){
			$data=array(
				"email"=>$this->input->post("username"),
				"password"=>$this->input->post("password")
			);
			$resource=$this->user_model->login($data);
			if($resource){
				
					$sessiondata=array(
						"email"=>$resource['email'],
						"session_id"=>$this->session->userdata('session_id')
					);
				if($this->user_model->setsession($sessiondata)){
					$session=$this->session->userdata('session_id');
					$this->session->set_userdata('Dsessionid',$session);
					$this->session->set_userdata('email',$resource['email']);
					
					redirect('config', 'refresh');
				}
			}else{
				
				$this->session->set_flashdata('login_error','Incorrect username or password.');
				 
				redirect('config/login');
			}
		}
		else {  	$this->load->view("login");	}
	}
	//Testing Session 
	function session(){
		print_r($this->session->all_userdata()); 	
	}
	function unsession(){
		$this->session->sess_destroy();	}
}