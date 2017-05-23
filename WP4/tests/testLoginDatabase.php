<?php
/**
 * Created by PhpStorm.
 * User: 11400481
 * Date: 23/05/2017
 * Time: 16:35
 */

namespace application\models\login_database;

use application\models\login_database;
use PHPUnit\Framework\TestCase;



class testLoginDatabase extends TestCase
{
    public function testThatWeCanCreateUsers(){

        $person = $this->createMock(login_database\class);
        $personRep = $this
            ->getMockBuilder(EntityRepository::class)
            ->disableOriginalConstructor()
            ->getMock();
        $personRep->expects($this->once())
            ->method('registration_insert')
            ->will($this->returnValue($person));

        $entityManager = $this
            ->getMockBuilder(ObjectManager::class)
            ->disableOriginalConstructor()
            ->getMock();
        $entityManager->expects($this->once())
            ->method('getRepository')
            ->will($this->returnValue($personRep));
    }
    public function testThatWeCanLogin(){

        $person = $this->createMock(login_database\class);
        $personRep = $this
            ->getMockBuilder(EntityRepository::class)
            ->disableOriginalConstructor()
            ->getMock();
        $personRep->expects($this->once())
            ->method('login')
            ->will($this->returnValue($person));

        $entityManager = $this
            ->getMockBuilder(ObjectManager::class)
            ->disableOriginalConstructor()
            ->getMock();
        $entityManager->expects($this->once())
            ->method('getRepository')
            ->will($this->returnValue($personRep));
    }
    public function testThatWeCanReadUserInfo(){

        $person = $this->createMock(login_database\class);
        $personRep = $this
            ->getMockBuilder(EntityRepository::class)
            ->disableOriginalConstructor()
            ->getMock();
        $personRep->expects($this->once())
            ->method('read_user_information')
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
