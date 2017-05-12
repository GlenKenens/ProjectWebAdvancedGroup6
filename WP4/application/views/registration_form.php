

<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
    header("location: http://localhost/login/index.php/user_authentication/user_login_process");
}
?>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://bootswatch.com/cerulean/bootstrap.min.css">
    </head>
<body>

<div class="container">
        <h1>Welcome to the Mokey Business registration form</h1>



<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/User_Authentication/new_user_registration">
    <legend>Create a new account</legend>
    <div class="form-group">
        <label for="edit" class="col-lg-2 control-label">Username</label>
        <div class="col-lg-10">
            <input type="text" name="username" id="username" size="10" /> <br>
        </div>
    </div>
    <div class="form-group">
        <label for="edit" class="col-lg-2 control-label">Email</label>
        <div class="col-lg-10">
            <input type="email" name="email_value" id="email_value" size="10" /> <br>
        </div>
    </div>
    <div class="form-group">
        <label for="edit" class="col-lg-2 control-label">Password</label>
        <div class="col-lg-10">
            <input type="text" name="password" id="password" size="10" /> <br>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
            <button type="submit" id="submit" class="btn btn-primary">Submit</button>

        </div>
    </div>
    <a href="<?php echo base_url() ?> " class="btn btn-primary">Back to login</a>
</form>
</div>
</body>
</html>

