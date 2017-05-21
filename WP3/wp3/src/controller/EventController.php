<?php

namespace controller;

use model\EventRepository;
use view\View;

class EventController
{
    private $eventRepository;
    private $view;

    public function __construct(EventRepository $eventRepository, View $view)
    {
        $this->eventRepository = $eventRepository;
        $this->view = $view;
    }

    public function handleFindEventById($id = null)
    {
        $event = $this->eventRepository->findEventById($id);
        $this->view->show(['events' => [$event]]);
    }

    public function handleFindEvents()
    {
        $events = $this->eventRepository->findEvents();
        $this->view->show(['events' => $events]);
    }

    public function handleFindEventsByPerson($person){
        $events = $this->eventRepository->findEventsByPerson($person);
        $this->view->show(['events' => $events]);
    }

    public function handleFindEventsByDate($fromDate, $untilDate){
        $events = $this->eventRepository->findEventsByDate($fromDate, $untilDate);
        $this->view->show(['events' => $events]);
    }

    public function handleFindEventsByPersonAndDate($person, $fromDate, $untilDate){
        $events = $this->eventRepository->findEventsByPersonAndDate($person, $fromDate, $untilDate);
        $this->view->show(['events' => $events]);
    }

    public function handleAddEvent($name, $person, $date){
        $events = $this->eventRepository->addEvent($name, $person, $date);
        header("location: ./src/view/EventsView.php");
    }

}
