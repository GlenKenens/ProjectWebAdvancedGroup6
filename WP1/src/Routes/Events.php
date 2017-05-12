<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

// Get All Events

$app->get('/api/events', function(Request $request, Response $response){
    $sql = "SELECT * FROM events";

    try{
        // Get db Object
        $db = new db();
        //connect
        $db = $db->connect();

        $statement = $db->query($sql);
        $events = $statement->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($events);
    }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Get All Events within date

$app->get('/api/events/', function(Request $request, Response $response){
    $from = $request->getParam('from');
    $until = $request->getParam('until');

    $sql = "SELECT * FROM events WHERE datum BETWEEN :from AND :until";

    try{
        // Get db Object
        $db = new db();
        //connect
        $db = $db->connect();

        $statement = $db->prepare($sql);
        $statement->bindParam(':from', $from);
        $statement->bindParam(':until', $until);
        $statement->execute();
        $events = $statement->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($events);
    }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Get 1 event

$app->get('/api/event/{id}', function(Request $request, Response $response){
    $id = $request->getAttribute('id');

    $sql = "SELECT * FROM events WHERE eventid= $id";

    try{
        // Get db Object
        $db = new db();
        //connect
        $db = $db->connect();

        $statement = $db->query($sql);
        $event = $statement->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($event);
    }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Get 1 person

$app->get('/api/event/person/{id}', function(Request $request, Response $response){
    $id = $request->getAttribute('id');

    $sql = "SELECT * FROM events WHERE persoonid= $id";

    try{
        // Get db Object
        $db = new db();
        //connect
        $db = $db->connect();

        $statement = $db->query($sql);
        $event = $statement->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($event);
    }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Add event

$app->post('/api/event/add', function(Request $request, Response $response){
    $persoonid = $request->getParam('persoonid');
    $datum = $request->getParam('datum');

    $sql = "INSERT INTO events (persoonid, datum) VALUES (:persoonid, :datum)";

    try{
        // Get db Object
        $db = new db();
        //connect
        $db = $db->connect();

        $statement = $db->prepare($sql);

        $statement->bindParam(':persoonid', $persoonid);
        $statement->bindParam(':datum', $datum);

        $statement->execute();

        echo '{"notice": {"text": "Event added"}';
    }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

//Delete event

$app->delete('/api/event/delete/{id}', function(Request $request, Response $response){
    $id = $request->getAttribute('id');

    $sql = "DELETE FROM events WHERE eventid = $id";

    try{
        // Get db Object
        $db = new db();
        //connect
        $db = $db->connect();
        $statement = $db->prepare($sql);
        $statement->execute();
        echo '{"notice": {"text": "Event deleted"}';
    }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Get all events for 1 person and within date

$app->get('/api/person/{id}/events/', function(Request $request, Response $response){
    $id = $request->getAttribute('id');
    $from = $request->getParam('from');
    $until = $request->getParam('until');

    $sql = "SELECT * FROM events WHERE persoonid = $id AND datum BETWEEN :from AND :until";

    try{
        // Get db Object
        $db = new db();
        //connect
        $db = $db->connect();

        $statement = $db->prepare($sql);
        $statement->bindParam(':from', $from);
        $statement->bindParam(':until', $until);
        $statement->execute();
        $events = $statement->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($events);
    }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Update event

$app->put('/api/event/update/{id}', function(Request $request, Response $response){
    $id= $request->getAttribute('id');

    $persoonid = $request->getParam('persoonid');
    $datum = $request->getParam('datum');

    $sql = "UPDATE events SET
                persoonid = :persoonid,
                datum = :datum
             WHERE eventid = $id";

    try{
        // Get db Object
        $db = new db();
        //connect
        $db = $db->connect();

        $statement = $db->prepare($sql);

        $statement->bindParam(':persoonid', $persoonid);
        $statement->bindParam(':datum', $datum);

        $statement->execute();

        echo '{"notice": {"text": "Event updated}';
    }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});