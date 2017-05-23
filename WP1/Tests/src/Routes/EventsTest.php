<?php
/**
 * Created by PhpStorm.
 * User: 11500493
 * Date: 19/05/2017
 * Time: 14:37
 */

require "C:/Xampp/htdocs/WP1/Tests/src/Routes/ApiTestCase.php";
class EventsTest extends ApiTestCase
{
    public function testGetEvents()
    {
        $this->request('GET', '/api/events');
        $this->assertThatResponseHasStatus(200);
    }

    /**public function testGetOneEvent()
    {
        $this->request('GET', '/api/event/1');
        $this->assertThatResponseHasStatus(200);
    }

    public function testGetEventsWithinDate()
    {
        $this->request('GET', '/api/events/?from=2017-05-01&until=2017-05-30');
        $this->assertThatResponseHasStatus(200);
    }

    public function testGetOnePerson()
    {
        $this->request('GET', '/api/events/person/1');
        $this->assertThatResponseHasStatus(200);
    }

    public function testGetEventsByPersonWithinDate()
    {
        $this->request('GET', '/api/person/1/events/?from=2017-05-01&until=2017-05-30');
        $this->assertThatResponseHasStatus(200);
    }
*/

}