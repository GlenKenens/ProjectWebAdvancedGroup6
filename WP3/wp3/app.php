<?php

require_once 'src/autoload.php';
use \model\PDOEventRepository;
use \view\EventJsonView;
use \controller\EventController;

$user = 'root';
$password = 'user';
$database = 'Project';
$pdo = null;
try {
    $pdo = new PDO("mysql:host=localhost;dbname=$database",
        $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION);

    $eventPDORepository = new PDOEventRepository($pdo);
    $eventJsonView = new EventJsonView();
    $eventController = new EventController($eventPDORepository, $eventJsonView);

    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $person = isset($_GET['person']) ? $_GET['person'] : null;
    $fromDate = isset($_GET['fromDate']) ? $_GET['fromDate'] : null;
    $untilDate = isset($_GET['untilDate']) ? $_GET['untilDate'] : null;
    $date = isset($_POST['date']) ? $_POST['date'] : null;


    if ($date != null){
        $name =  isset($_POST['name']) ? $_POST['name'] : null;
        $person =  isset($_POST['person']) ? $_POST['person'] : null;
        if ($person != null && $date != null){
            $eventController->handleAddEvent($name, $person, $date);
        } else{
            echo "Gelieve alle verlden in te vullen.";
        }
    }else{
       if ($id == null) {
            if ($person == null && $fromDate == null && $untilDate == null ) {
                $eventController->handleFindEvents();
            } else if($person != null && $fromDate == null && $untilDate == null){
                $eventController->handleFindEventsByPerson($person);
            } else if($person == null && $fromDate != null && $untilDate != null){
                if($fromDate <= $untilDate){
                    $eventController->handleFindEventsByDate($fromDate, $untilDate);
                } else{
                    echo "De ingevulde datums zijn ongeldig.";
                }
            } else if($person != null && $fromDate != null && $untilDate != null){
                if ($fromDate <= $untilDate){
                    $eventController->handleFindEventsByPersonAndDate($person, $fromDate, $untilDate);
                } else{
                    echo "De ingevulde datums zijn ongeldig.";
                }
            } else {
                echo "Indien u op datum wenst te filteren moeten beide datums ingevuld worden.";
            }
        } else {
            $eventController->handleFindEventById($id);
        }
    }


} catch (Exception $e) {
    echo 'cannot connect to database';
}



