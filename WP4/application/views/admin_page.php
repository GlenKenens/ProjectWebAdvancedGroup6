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
    <link rel="stylesheet" href="https://bootswatch.com/cerulean/bootstrap.min.css">

</head>
<body>
<div id="profile">

    <div class="container">
        <h1>Welcome to the Monkey Business admin page!</h1>

        <p id="message"></p>
        <p id="createmsg"></p>

        <br><br>

        <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/People/person/">
            <legend>Create a customer</legend>
            <div class="form-group">
            <label for='name' class="col-lg-2 control-label"> Name </label>
                <div class="col-lg-10">
                    <input type='text' name='name' id='name' size='30' /> <br>
                </div>
            </div>
            <div class="form-group">
            <label for='address' class="col-lg-2 control-label"> Address </label>
                <div class="col-lg-10">
                    <input type='text' name='address' id='address' size='30' /> <br>
                </div>
            </div>
            <div class="form-group">
            <label for='telephone' class="col-lg-2 control-label"> Telephone </label>
                <div class="col-lg-10">
                    <input type='text' name='telephone' id='telephone' size='30' /> <br>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button type="submit" id="create" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>

        <br>

        <form class="form-horizontal" method="get" action="<?php echo base_url(); ?>index.php/People/deleteUser">
            <legend>Delete a customer</legend>
            <div class="form-group">
            <label for="edit" class="col-lg-2 control-label"> Customer ID</label>
                <div class="col-lg-10">
                    <input type="text" name="personID" id="personID" size="10" /> <br>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button type="submit" id="delete" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>

        <br>


        <form class="form-horizontal" method="get" action="<?php echo base_url(); ?>index.php/People/editUser">
            <legend>Edit a customer</legend>
            <div class="form-group">
            <label for="id" class="col-lg-2 control-label">Customer ID</label>
                <div class="col-lg-10">
                    <input type="text" name="personIDedit" id="personid" size="30" /> <br>
                </div>
            </div>
            <div class="form-group">
            <label for="editname" class="col-lg-2 control-label">New Name</label>
                <div class="col-lg-10">
                    <input type="text" name="editname" id="editname" size="30" /> <br>
                </div>
            </div>
            <div class="form-group">
            <label for="editname" class="col-lg-2 control-label">New Address</label>
                <div class="col-lg-10">
                    <input type="text" name="editaddress" id="editaddress" size="30" /> <br>
                </div>
            </div>
            <div class="form-group">
            <label for="editname" class="col-lg-2 control-label">New Telephone</label>
                <div class="col-lg-10">
                    <input type="text" name="edittelephone" id="edittelephone" size="30" /> <br>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button type="submit" id="update" class="btn btn-primary">Update</button>
                </div>
            </div>

        </form>




        <a href="logout" class="btn btn-primary">Logout</a>
    </div>

</div>
<br/>
</body>
</html>