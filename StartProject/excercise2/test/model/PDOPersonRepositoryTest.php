<?php

use \model\Events;
use \model\PDOPersonRepository;

class PDORepositoryTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->mockPDO = $this->getMockBuilder('PDO')
            ->disableOriginalConstructor()
            ->getMock();

        $this->mockPDOStatement = $this->getMockBuilder('PDOStatement')
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function tearDown()
    {
        $this->mockPDO = null;
        $this->mockPDOStatement = null;
    }

    public function testFindPersonById_idExists_PersonObject()
    {
        $person = new Events(1, 'testperson');
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('bindParam');

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('execute');

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('fetchAll')
            ->will($this->returnValue([['EventId' => $person->getEventId(), 'Person' => $person->getPersonId()]]));

        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));

        $pdoRepository = new PDOPersonRepository($this->mockPDO);
        $actualPerson = $pdoRepository->findEventById($person->getEventId());

        $this->assertEquals($person, $actualPerson);
    }

    public function testFindPersonById_idDoesNotExist_Null()
    {
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('bindParam');

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('execute');

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('fetchAll')
            ->will($this->returnValue([]));

        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));

        $pdoRepository = new PDOPersonRepository($this->mockPDO);
        $actualPerson = $pdoRepository->findEventById(222);

        $this->assertNull($actualPerson);
    }

    public function testFindPersonById_exeptionThrownFromPDO_Null()
    {
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('bindParam')->will($this->throwException(new Exception()));


        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));

        $pdoRepository = new PDOPersonRepository($this->mockPDO);
        $actualPerson = $pdoRepository->findEventById(1);

        $this->assertNull($actualPerson);
    }


}