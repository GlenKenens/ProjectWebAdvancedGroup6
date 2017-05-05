<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Admin</title>

</head>
<body>

<div class="container">
	<h1>Welcome to Admin!</h1>

<div id="data">
<table>

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

</body>
</html>