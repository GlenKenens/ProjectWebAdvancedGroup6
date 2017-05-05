<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
    $username = ($this->session->userdata['logged_in']['username']);
    $email = ($this->session->userdata['logged_in']['email']);
} else {
    header("location: login");
}
?>
<head>
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://bootswatch.com/cyborg/bootstrap.min.css">

</head>
<body>
<div id="profile">

    <div class="container">
        <h1>Welcome to Admin!</h1>

        <p id="message"></p>
        <p id="createmsg"></p>

        <br> <br><br>

        <h3>Create Persons</h3>

        <form method="post" action="<?php echo base_url(); ?>index.php/People/person/">

            <label for='name'> Name </label>
            <input type='text' name='name' id='name' size='30' /> <br>

            <label for='address'> Address </label>
            <input type='text' name='address' id='address' size='30' /> <br>

            <label for='telephone'> Telephone </label>
            <input type='text' name='telephone' id='telephone' size='30' /> <br>

            <input type="submit" value="Create" id="create" />

        </form>

        <br><br>

        <form method="get" action="<?php echo base_url(); ?>index.php/People/deleteUser">
            <label for="edit"> Type in the id to delete</label>
            <input type="text" name="personID" id="personID" size="10" /> <br>

            <input type="submit" value="Delete" id="delete" />

        </form>

        <br><br><br>


        <form method="get" action="<?php echo base_url(); ?>index.php/People/editUser">

            <label for="id">Person ID</label>
            <input type="text" name="personIDedit" id="personid" size="30" /> <br>

            <label for="editname">Edit Name</label>
            <input type="text" name="editname" id="editname" size="30" /> <br>

            <label for="editname">Edit Address</label>
            <input type="text" name="editaddress" id="editaddress" size="30" /> <br>

            <label for="editname">Edit Telephone</label>
            <input type="text" name="edittelephone" id="edittelephone" size="30" /> <br>

            <input type="submit" value="Update" id="update">

        </form>





    </div>
    <b id="logout"><a href="logout">Logout</a></b>
</div>
<br/>
</body>
</html>