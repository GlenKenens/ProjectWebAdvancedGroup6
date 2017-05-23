/**
 * Created by Gauthier on 23/05/2017.
 */
function getAllEvents() {
    fetch("http://192.168.17.131/~user/wp3_simple/wp3/app.php?")
        .then(response => response.json())
.then(data => {
    document.getElementById('idFetched').innerHTML = data[0].id;
    document.getElementById('naamFetched').innerHTML = data[0].name;
    document.getElementById('personFetched').innerHTML = data[0].person;
    document.getElementById('datumFetched').innerHTML = data[0].date;
});
}

function getById(){
    var urlId = document.getElementById('idOfEvent').value;
    var getDataId;
    fetch('http://192.168.17.131/~user/wp3_simple/wp3/app.php?id=' + urlId)
        .then(response => response.json())
.then(data => {
    document.getElementById('idFetched').innerHTML = data[0].id;
    document.getElementById('naamFetched').innerHTML = data[0].name;
    document.getElementById('personFetched').innerHTML = data[0].person;
    document.getElementById('datumFetched').innerHTML = data[0].date;
})
}

function postData(){
    var postData = {
        project_Id: document.getElementById('postId').value,
        project_naam: document.getElementById('PostName').value,
        project_persoon: document.getElementById('PostPerson').value
    };
    fetch('http://192.168.17.131/~user/wp3_simple/wp3/app.php', {
        method: 'POST',
        body: JSON.stringify(
            postData
        )
    })
        .then(function (data) {
            console.log('Req succesfull');
            console.log(postData);
        })
        .catch(function (error) {
            console.log('Request failure: ', error);
        });
}

function afterLoaded(){
    document.getElementById("getAllEvents").addEventListener("click",getAllEvents,false);
    document.getElementById("postData").addEventListener("click",postData,false);
    document.getElementById("getEventById").addEventListener("click",getById,false);
}
window.addEventListener("load",afterLoaded,false);