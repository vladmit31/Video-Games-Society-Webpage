<?php require_once('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>


<br>
<h3>Add new Member</h3>
<hr/>

<form action="<?php echo url_for('./members/create.php'); ?>" method="post">
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="name">Name*</label>
      <input type="text" class="form-control" name="name" placeholder="Name" method="post" required>
    </div>
   
   <div class="form-group col-md-5">
      <label for="tel">Tel</label>
      <input type="text" class="form-control" name="tel" placeholder="Tel" method="post">
    </div>
  </div>
  
  <div class="form-group col-md-5">
      <label for="email">Email</label>
      <input type="text" class="form-control" name="email" placeholder="Email" method="post">
    </div>
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="extensions_made">Extensions Made</label>
      <select name="extensions_made" class="form-control" id="extensions_made" method="post">
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
      </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Add</button>
</form>


    
<hr/>
<?php include(SHARED_PATH . '/footer.php'); ?>