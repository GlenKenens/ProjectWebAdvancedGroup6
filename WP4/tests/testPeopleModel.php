<?php
namespace application\models\PeopleModel;
use application\models\PeopleModel;
use PHPUnit\Framework\TestCase;
/**
 * Created by PhpStorm.
 * User: 11400481
 * Date: 21/05/2017
 * Time: 16:24
 */
class testPeopleModel extends TestCase
{
    public function testThatWeCanInsertPeople(){

        $person = $this->createMock(PeopleModel\class);
        $personRep = $this
            ->getMockBuilder(EntityRepository::class)
            ->disableOriginalConstructor()
            ->getMock();
        $personRep->expects($this->once())
            ->method('insertPerson')
            ->will($this->returnValue($person));

        $entityManager = $this
            ->getMockBuilder(ObjectManager::class)
            ->disableOriginalConstructor()
            ->getMock();
        $entityManager->expects($this->once())
            ->method('getRepository')
            ->will($this->returnValue($personRep));
    }
    public function testThatWeCanDeletePeople(){

        $person = $this->createMock(PeopleModel\class);
        $personRep = $this
            ->getMockBuilder(EntityRepository::class)
            ->disableOriginalConstructor()
            ->getMock();
        $personRep->expects($this->once())
            ->method('deletePerson')
            ->will($this->returnValue($person));

        $entityManager = $this
            ->getMockBuilder(ObjectManager::class)
            ->disableOriginalConstructor()
            ->getMock();
        $entityManager->expects($this->once())
            ->method('getRepository')
            ->will($this->returnValue($personRep));
    }
    public function testThatWeCanGetPeople(){

        $person = $this->createMock(PeopleModel\class);
        $personRep = $this
            ->getMockBuilder(EntityRepository::class)
            ->disableOriginalConstructor()
            ->getMock();
        $personRep->expects($this->once())
            ->method('getPerson')
            ->will($this->returnValue($person));

        $entityManager = $this
            ->getMockBuilder(ObjectManager::class)
            ->disableOriginalConstructor()
            ->getMock();
        $entityManager->expects($this->once())
            ->method('getRepository')
            ->will($this->returnValue($personRep));
    }
    public function testThatWeCanUpdatePeople(){

        $person = $this->createMock(PeopleModel\class);
        $personRep = $this
            ->getMockBuilder(EntityRepository::class)
            ->disableOriginalConstructor()
            ->getMock();
        $personRep->expects($this->once())
            ->method('updatePerson')
            ->will($this->returnValue($person));

        $entityManager = $this
            ->getMockBuilder(ObjectManager::class)
            ->disableOriginalConstructor()
            ->getMock();
        $entityManager->expects($this->once())
            ->method('getRepository')
            ->will($this->returnValue($personRep));
    }
}
