<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Welcome to Admin</title>

    <link rel="stylesheet" href="./CSS_WP2.css" type='text/css' media='screen' charset='utf-8'/>
</head>

<body>



<div class="container">
	<h1>Welcome to Werkpakket 2!</h1>
    <br>


<div id="data">
<table>
    <h2>All our users</h2>
    <tr>
        <td>personID</td>
        <td>name</td>
        <td>address</td>
        <td>telephonenumber</td>
    </tr>
   <?php foreach ($names as $row) { ?>

   <tr>
      <td><?=$row->personID?></td>
      <td><?=$row->name?></td>
      <td><?=$row->address?></td>
      <td><?=$row->telephone?></td>
    </tr>

    <?php } ?>



</table>
</div>

<br>



<br> <br><br>

<div id="container">

   <form method="post" action="<?php echo base_url(); ?>index.php/People/person" class="form-style-1" id="leftForm">
       <h3>Create Persons</h3>
   <label for='name'> Name </label>
   <input type='text' name='name' id='name' size='30' /> <br>

   <label for='address'> Address </label>
   <input type='text' name='address' id='address' size='30' /> <br>
   
      <label for='telephone'> Telephone </label>
   <input type='text' name='telephone' id='telephone' size='30' /> <br>

       <input type="submit" value="Create" id="create">
   
   </form>
   
   <br><br>
   


   
   <br>
    <form method="get" action="<?php echo base_url(); ?>index.php/People/editUser" class="form-style-1" id="RightForm">
        <h3>Edit Person</h3>
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
    <form method="get" action="<?php echo base_url(); ?>index.php/People/deleteUser" class="form-style-1" id="Formright">
        <h3>Delete by ID</h3>
        <label for="personID">PersonID</label>
        <input type="text" name="personID" id="personID" size="10" /> <br>

        <input type="submit" value="Delete" id="delete" />

    </form>
</div>

</div>

</body>
</html>