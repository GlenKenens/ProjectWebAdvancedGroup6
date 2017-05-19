<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class peopleModel extends CI_Model {

    public function getPeoples()
    {
        $this->db->select("*");
        $this->db->from('persons');

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

        $this->db->set('name', $this->db->escape_str($name));
        $this->db->set('address', $this->db->escape_str($address));
        $this->db->set('telephone', $this->db->escape_str($telephone));
        $this->db->insert('persons');
    }

    public function deletePerson($personID) {
        $this->db->where('personID', $this->db->escape($personID));
        $this->db->delete('persons');
    }

    public function getPerson($personID) {

        $this->db->where('personID', $this->db->escape_str($personID));
        $query = $this->db->get('persons');



        $result = $query->result();

        foreach ($result as $row) {

            $users[$row->personID] = array($row->name, $row->address, $row->telephone);
            return $users->result();
        }

    }

    public function updatePerson($personID, $name, $address, $telephone) {

        $this->db->where('personID', $this->db->escape_str($personID));
        $this->db->set('name', $this->db->escape_str($name));
        $this->db->set('address', $this->db->escape_str($address));
        $this->db->set('telephone', $this->db->escape_str($telephone));
        $this->db->update('persons');
    }


}
