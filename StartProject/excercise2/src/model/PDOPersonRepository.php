<?php

namespace model;

class PDOPersonRepository implements PersonRepository
{
    private $connection = null;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function findEventById($id )
    {

        try {
            $statement = $this->connection->prepare('SELECT * FROM Events WHERE EventId=?');
            $statement->bindParam(1, $id, \PDO::PARAM_INT);
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

            if (count($results) > 0) {
                return new Events($results[0]['EventId'], $results[0]['PersonId'],$results[0]['Date']);
            } else {
                return null;
            }

        } catch (\Exception $exception) {

            return null;
        }
    }
}
