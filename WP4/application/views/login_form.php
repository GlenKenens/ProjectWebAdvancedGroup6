

<html>
//<?php
//if (isset($this->session->userdata['logged_in'])) {

 //   header("location:http://192.168.116.134/~user/login/index.php/user_authentication/user_login_process");
//}
//?>

<head>
    <title>Login Form</title>
    <link rel="stylesheet" href="https://bootswatch.com/cerulean/bootstrap.min.css">

</head>
<body>
<?php
if (isset($logout_message)) {
    echo "<div class='message'>";
    echo $logout_message;
    echo "</div>";
}
?>
<?php
if (isset($message_display)) {
    echo "<div class='message'>";
    echo $message_display;
    echo "</div>";
}
?>

    <div class="container">

        <h1>Welcome to the monkey business website!</h1>
        <hr/>
        <?php echo form_open('User_Authentication/user_login_process'); ?>
        <?php
        echo "<div class='error_msg'>";
        if (isset($error_message)) {
            echo $error_message;
        }
        echo validation_errors();
        echo "</div>";
        ?>
        <form class="form-horizontal">
            <legend>Login</legend>
            <div class="form-group">
                <label class="col-lg-2 control-label">UserName :</label>
                <div class="col-lg-10">
                    <input type="text" name="username" id="name" placeholder="username"/><br /><br />
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label">Password :</label>
                <div class="col-lg-10">
                    <input type="password" name="password" id="password" placeholder="**********"/><br/><br />
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                    <a href="<?php echo base_url() ?>index.php/User_Authentication/user_registration_show" class="btn btn-primary">Register</a>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </form>
    </div>
</body>
</html>

