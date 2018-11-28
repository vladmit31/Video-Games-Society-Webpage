<?php require_once('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>


<br>
<h3>Add new Staff</h3>
<hr/>

<form action="<?php echo url_for('./staff/create.php'); ?>" method="post">
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="name">Name*</label>
      <input type="text" class="form-control" name="name" placeholder="Name" method="post" required>
    </div>
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="role">Role</label>
      <select name="role" class="form-control" method="post">
         <option value=""></option>
         <option value="Secretary">Secretary</option>
         <option value="Volunteer">Volunteer</option>    
      </select>
    </div>
 </div>
 
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="pass">Password*</label>
      <input type="password" class="form-control" name="password" placeholder="Password" method="post" required>
    </div>
  </div>
  
    <button type="submit" class="btn btn-primary">Add</button>
</form>


    
<hr/>
<?php include(SHARED_PATH . '/footer.php'); ?>