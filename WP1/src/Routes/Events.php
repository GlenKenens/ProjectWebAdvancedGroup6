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

$app->get('/api/events/?from={from}&until={until}', function(Request $request, Response $response){
    $from = $request->getAttribute('from');
    $until = $request->getAttribute('until');

    $sql = "SELECT * FROM events WHERE datum BETWEEN $from AND $until";

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

// Add event

$app->post('/api/event/add', function(Request $request, Response $response){
    $persoon = $request->getParam('persoon');
    $datum = $request->getParam('datum');

    $sql = "INSERT INTO events (persoon, datum) VALUES (:persoon, :datum)";

    try{
        // Get db Object
        $db = new db();
        //connect
        $db = $db->connect();

        $statement = $db->prepare($sql);

        $statement->bindParam(':persoon', $persoon);
        $statement->bindParam(':datum', $datum);

        $statement->execute();

        echo '{"notice": {"text": "Event toegevoegd"}';
    }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Update event

$app->put('/api/event/update/{id}', function(Request $request, Response $response){
    $id= $request->getAttribute('id');

    $persoon = $request->getParam('persoon');
    $datum = $request->getParam('datum');

    $sql = "UPDATE events SET
                persoon = :persoon,
                datum = :datum
             WHERE eventid = $id";

    try{
        // Get db Object
        $db = new db();
        //connect
        $db = $db->connect();

        $statement = $db->prepare($sql);

        $statement->bindParam(':persoon', $persoon);
        $statement->bindParam(':datum', $datum);

        $statement->execute();

        echo '{"notice": {"text": "Event updated}';
    }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});