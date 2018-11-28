<?php require_once('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<?php require_Secretary_login(); ?>

<?php 
$id = $_GET['id'] ?? ''; 
if($id == "") redirect_to(url_for('./staff/index.php') );

if(is_post_request()) {

    
  $staff = [];
  $staff['name'] = $_POST['name'] ?? '';
  $staff['role'] = $_POST['role'] ?? '';

   
  $sql = "UPDATE Staff SET ";
    $sql .= "Name='" . $staff['name'] . "',";
    $sql .= "Role='" . $staff['role'] . "' "; 
    $sql .= "WHERE Staff_ID LIKE'".$id."'";

    $result = mysqli_query($db, $sql);

    if($result) {
       mysqli_free_result($result);
       redirect_to(url_for('./staff/index.php') );
    }else {
      // UPDATE failed
      mysqli_free_result($result);
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

    
}

    $sql = "SELECT * FROM Staff ";
    $sql.= "WHERE Staff_ID='" . $id . "'";
    
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    
    $staff = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

?>

<br>
<h3>Edit Staff</h3>
<hr/>

<form action="<?php echo url_for('./staff/edit.php?id='.h(u($staff['Staff_ID'])) ); ?>" method="post">

  <div class="form-row">
   <div class="form-group col-md-5">
      <label for="name">Name*</label>
      <input type="text" class="form-control" name="name" value="<?php echo h($staff['Name']); ?>" method="post" required>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="role">Role</label>
      <select name="role" class="form-control" method="post">
      
      <?php if( ($staff['Role']) == ''){ ?>
              <option selected="selected" value=""></option>
              <option value="Secretary">Secretary</option>
              <option value="Volunteer">Volunteer</option>        
        <?php } ?>
         <?php if( ($staff['Role']) == 'Secretary'){ ?>
              <option value=""></option>
              <option selected="selected" value="Secretary">Secretary</option>
              <option value="Volunteer">Volunteer</option>        
        <?php } ?>
          <?php if( ($staff['Role']) == 'Volunteer'){ ?>
              <option value=""></option>
              <option value="Secretary">Secretary</option>
              <option selected="selected" value="Volunteer">Volunteer</option>        
        <?php } ?>
     
      </select>
    </div>
    </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>

<hr/>

<?php include(SHARED_PATH . '/footer.php'); ?>