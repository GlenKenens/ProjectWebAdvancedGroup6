<?php

namespace view;

class PersonJsonView implements View
{
    public function show(array $data)
    {
        header('Content-Type: application/json');

        if (isset($data['Events'])) {
            $person = $data['Events'];
            echo json_encode(['EventId' => $person->getEventId(), 'PersonId' => $person->getPersonId()]);
        } else {
            echo '{}';
        }
    }
}
