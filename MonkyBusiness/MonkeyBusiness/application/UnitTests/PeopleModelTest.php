<?php

/**
 * Created by PhpStorm.
 * User: 11501101
 * Date: 21/05/2017
 * Time: 12:18
 */
class PeopleModelTest extends PHPUnit\Framework\TestCase
{


    public function testGetAllPeople() {
        $this->load->model('post');
        $posts = $this->CI->post->getPeoples();
        $this->assertEquals(7, count($posts));
    }
}
