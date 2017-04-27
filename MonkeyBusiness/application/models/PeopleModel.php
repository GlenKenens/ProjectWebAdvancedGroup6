<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class peopleModel extends CI_Model {

	public function getPeoples()
	{
		$this->db->select("*");
		$this->db->from('Persons');
		
		$query = $this->db->get();

		return $query->result();
		/*
		$num_data_returned = $query->num_rows;
		
		if ($num_data_returned < 1) {
			
			echo "There is no data in the database";
			exit(); }
		*/
	}
	
	public function insertPerson($name, $address, $telephone) {
		
		$this->db->set('name', $name);
		$this->db->set('address', $address);
		$this->db->set('telephone', $telephone);
		$this->db->insert('Persons');
	}
	
	public function deletePerson($personID) {
		$this->db->where('personID', $personID);
		$this->db->delete('Persons');
	}
	
	public function getPerson($personID) {
         
		 $this->db->where('personID', $personID);
		 $query = $this->db->get('Person');
		 


		$result = $query->result();
		
		foreach ($result as $row) {
			
			$users[$row->personID] = array($row->name, $row->address, $row->telephone);
            return $users->result();
        }

		 }
		 

	
	
		public function updatePerson($personID, $name, $address, $telephone) {
		
		$this->db->where('personID', $personID);
		$this->db->set('name', $name);
		$this->db->set('address', $address);
		$this->db->set('telephone', $telephone);
		$this->db->update('Person');
	}
	
	
}
