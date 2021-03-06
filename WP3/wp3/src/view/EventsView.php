<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to the event page</title>
    <link rel="stylesheet" href="EventsStyle.css"/>

</head>
<body>


<div class="container">
    <header>
        <a href="index.php"><h1>Monkey<span class="color"> Business</span></h1></a>
    </header>

    <form method="get" action="../../app.php">
        <input type="submit" value="Toon alle events">
    </form>
    <button id="getAllEvents">Fetch alle events</button>


    <form method="get" action="../../app.php">
        <label for="idFilter">Filter op eventID</label>
        <input type="text" name="id" id="idFilter" size="30" /> <br>
        <input type="submit" value="Filter">
    </form>
    <input type="text" id="idOfEvent">
    <button id="getEventById">Fetch event met id</button>


    <form method="get" action="../../app.php">
        <label for="personFilter">Filter op persoon</label>
        <input type="text" name="person" id="personFilter" size="30" /> <br>

        <label>Filter op datum</label> <br>
        <label for="fromDateFilter">van</label>
        <input type="date" name="fromDate" id="fromDateFilter" size="30" />
        <label for="untilDateFilter">tot</label>
        <input type="date" name="untilDate" id="untilDateFilter" size="30" /> <br>
        <input type="submit" value="Filter">
    </form>

    <form method="post" action="../../app.php">
        <h2>Voeg nieuw event toe</h2>
        <label for="name">Naam</label>
        <input type="text" name="name" id="name" size="30" /> <br>
        <label for="person">Organisator</label>
        <input type="text" name="person" id="person" size="30" /> <br>
        <label for="name">Datum</label>
        <input type="date" name="date" id="date" size="30" /> <br>
        <input type="submit" value="Toevoegen">
    </form>

    <h2>Post event met fetch</h2>
    <div>
        <label for="postId">Id</label>
        <input type="text" id="postId"> <br>
        <label for="postName">Naam</label>
        <input type="text" id="postName"> <br>
        <label for="postPerson">Organisator</label>
        <input type="text" id="postPerson"> <br>
        <label for="postDate">Datum</label>
        <input type="text" id="postDate"> <br>
        <button id="postData">Post Event met fetch</button>

    </div>

    <div id="table">
        <table>
            <thead>
            <tr>
                <th>Id</th>
                <th>Naam</th>
                <th>Organisator</th>
                <th>Datum</th>
            </tr>
            </thead>
            <tr>
                <td id="idFetched"></td>
                <td id="naamFetched"></td>
                <td id="personFetched"></td>
                <td id="datumFetched"></td>
            </tr>
        </table>
    </div>

</div>
<script src="../../fetch.js"></script>
</body>
</html>