<?php

namespace model;

class Event implements \JsonSerializable
{
    private $id;
    private $name;
    private $person;
    private $date;

    public function __construct($id, $name, $person, $date)
    {
        $this->id = $id;
        $this->name = $name;
        $this->person = $person;
        $this->date = $date;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setPerson($person)
    {
        $this->person = $person;
    }

    public function getPerson()
    {
        return $this->person;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'person' => $this->person,
            'date' => $this->date
        ];
    }

}
