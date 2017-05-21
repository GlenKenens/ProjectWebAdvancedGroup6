<?php

namespace view;

class EventJsonView implements View
{
    public function show(array $data)
    {
        header('Content-Type: application/json');

        if (isset($data['events'])) {
            $events = $data['events'];
           // echo json_encode($events);
            foreach($events as $event){
                echo json_encode($event);
                echo "\n";
            }
           ($events[0]);
        } else {
            echo '{}';
        }
    }
}

