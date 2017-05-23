<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class People extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('PeopleModel');
	}

	public function index()
	{
		$this->load->model('PeopleModel');
		$data['names'] = $this->PeopleModel->getPeoples();
		$this->load->view('name_display', $data);
	}
	
	public function person() {
		
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			
			$name = $this->input->post('name');
			$address = $this->input->post('address');
			$telephone = $this->input->post('telephone');
			
			$data = $this->PeopleModel->insertperson($name, $address, $telephone);
			$this->index();
		}
		
		elseif ($this->input->server('REQUEST_METHOD') == 'GET') {
		     
			 $personID = $this->input->get('personID');

			 $deleted = $this->PeopleModel->deleteperson($personID);
			 echo json_encode($deleted);
		
		}
	}
	
	public function deleteUser(){
        $personID = $this->input->get('personID');

        $this->PeopleModel->deleteperson($personID);
        $this->index();
    }
	
	public function user() {

		if ($this->input->server('REQUEST_METHOD') == 'POST') {

			$personID = $this->input->post('personID');
			$name = $this->input->post('name');
			$address = $this->input->post('address');
			$telephone = $this->input->post('telephone');

			$update = $this->PeopleModel->updatePerson($personID, $name, $address, $telephone);
			echo json_encode($update);


		}

		elseif ($this->input->server('REQUEST_METHOD') == 'GET') {

			 $personID = $this->input->get('personID');

			 $edit = $this->PeopleModel->getPerson($personID);
			 echo json_encode($edit);
		}
	}
    public function editUser(){
        $personID = $this->input->get('personIDedit');
        $name = $this->input->get('editname');
        $address = $this->input->get('editaddress');
        $telephone = $this->input->get('edittelephone');
        $update = $this->PeopleModel->updatePerson($personID, $name, $address, $telephone);

        $this->index();
    }
	
	
	
}
