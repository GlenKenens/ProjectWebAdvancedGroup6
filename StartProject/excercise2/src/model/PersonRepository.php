<?php

namespace model;

interface PersonRepository
{
    public function findEventById($EventId);
    /*
    public function findPersons();
    public function add(Events $person);
    public function remove($id);
    */
}
