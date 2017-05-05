<!doctype html>
<html>
<head>
    <title>Local Storage WP5</title>

    <script>
        function save(){
            var textValue = document.getElementById('textfield').value;
            localStorage.setItem('text', textValue);
        }

        function load(){
            var storedValue = localStorage.getItem('text');
            if(storedValue){
                document.getElementById('textfield').value = storedValue;
            }
        }

        function remove(){
            document.getElementById('textfield').value = '';
            localStorage.removeItem('text');
        }


    </script>
</head>
<body onload="load()">
<input text="text" id="textfield" />
<input type="button" value="save" onclick="save()" />
<input type="button" value="remove" onclick="remove()" />
</body>
</html>


<!--Bron: https://www.youtube.com/watch?v=DHUxnUX7Y2Y-->