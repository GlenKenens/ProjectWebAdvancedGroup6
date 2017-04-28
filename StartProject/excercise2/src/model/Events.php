<?php

namespace model;

class Events
{
    private $EventId;
    private $PersonId;
    private $Date;

    public function __construct($EventId, $PersonId,$Date)
    {
        $this->EventId = $EventId;
        $this->PersonId = $PersonId;
        $this->Date=$Date;
    }

    public function getPersonId()
    {
        return $this->PersonId;
    }

    public function getDate()
    {
        $this->Date;
    }

    public function getEventId()
    {
        return $this->EventId;
    }
}
