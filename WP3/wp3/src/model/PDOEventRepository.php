<?php

namespace model;

class PDOEventRepository implements EventRepository
{
    private $connection = null;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function findEventById($id)
    {
        try {
            $statement = $this->connection->prepare('SELECT * FROM Events WHERE eventID=?');
            $statement->bindParam(1, $id, \PDO::PARAM_INT);
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

            if (count($results) > 0) {
                return new Event($results[0]['eventID'], $results[0]['naam'], $results[0]['person'], $results[0]['datum']);
            } else {
                return null;
            }
        } catch (\Exception $exception) {
            return null;
        }
    }

    public function findEvents()
    {
        try {
            $statement = $this->connection->prepare('SELECT * FROM Events');
            $statement->execute();
            $events = [];
            $statement->setFetchMode(\PDO::FETCH_ASSOC);
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($results as $event) {
                $events[] = new Event($event['eventID'], $event['naam'], $event['person'], $event['datum']);
            }
            return $events;
        } catch (\Exception $exception) {
            return null;
        }
    }

    public function findEventsByPerson($person){
        try {
            $statement = $this->connection->prepare('SELECT * FROM Events WHERE person=?');
            $statement->bindParam(1, $person, \PDO::PARAM_INT);
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

            if (count($results) > 0) {
                foreach ($results as $event) {
                    $events[] = new Event($event['eventID'], $event['naam'], $event['person'], $event['datum']);
                }
                return $events;
            } else {
                return null;
            }
        } catch (\Exception $exception) {
            return null;
        }
    }

    public function findEventsByDate($fromDate, $untilDate){
        try {
            $statement = $this->connection->prepare('SELECT * FROM Events WHERE datum BETWEEN ? AND ?');
            $statement->bindParam(1, $fromDate, \PDO::PARAM_INT);
            $statement->bindParam(2, $untilDate, \PDO::PARAM_INT);
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

            if (count($results) > 0) {
                foreach ($results as $event) {
                    $events[] = new Event($event['eventID'], $event['naam'], $event['person'], $event['datum']);
                }
                return $events;
            } else {
                return null;
            }
        } catch (\Exception $exception) {
            return null;
        }
    }

    public function findEventsByPersonAndDate($person, $fromDate, $untilDate){
        try {
            $statement = $this->connection->prepare('SELECT * FROM Events WHERE person=? AND datum BETWEEN ? AND ?');
            $statement->bindParam(1, $person, \PDO::PARAM_INT);
            $statement->bindParam(2, $fromDate, \PDO::PARAM_INT);
            $statement->bindParam(3, $untilDate, \PDO::PARAM_INT);
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

            if (count($results) > 0) {
                foreach ($results as $event) {
                    $events[] = new Event($event['eventID'], $event['naam'], $event['person'], $event['datum']);
                }
                return $events;
            } else {
                return null;
            }
        } catch (\Exception $exception) {
            return null;
        }
    }

    public function addEvent($name, $person, $date){
        try {
            $statement = $this->connection->prepare('INSERT INTO Events (naam, person, datum) VALUES (?, ?, ?)');
            $statement->bindParam(1, $name, \PDO::PARAM_INT);
            $statement->bindParam(2, $person, \PDO::PARAM_INT);
            $statement->bindParam(3, $date, \PDO::PARAM_INT);
            $statement->execute();

        } catch (\Exception $exception) {
            return null;
        }
    }
}
