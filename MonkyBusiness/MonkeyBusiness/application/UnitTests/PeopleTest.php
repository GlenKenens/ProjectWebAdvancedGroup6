<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: 11501101
 * Date: 21/05/2017
 * Time: 12:08
 */
class PeopleTest extends PHPUnit\Framework\TestCase
{
    public function test_index()
    {
        $output = $this->request('GET', 'People/index');
        $this->assertContains('<h1>Welcome to Werkpakket 2!</h1>', $output);
    }

    public function test_method_404()
    {
        $this->request('GET', 'People/method_not_exist');
        $this->assertResponseCode(404);
    }
}
