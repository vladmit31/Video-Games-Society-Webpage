<?php require_once('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<br/>

<?php 
if(is_post_request()) {
    $platform = [];
    $platform['Platform'] = $_POST['platform'] ?? '';
    $platform['Updated'] = $_POST['updated'] ?? '';
    
    if($platform['Updated'] == ''){
        $sql = "DELETE FROM Constants ";
        $sql.= "WHERE Platform='" . $platform['Platform'] . "'";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);   
        mysqli_free_result($result);
    }else{
        
        $sql = "UPDATE Constants SET ";
        $sql .= "Platform='" . $platform['Updated'] . "' ";
        $sql .= "WHERE Platform='" . $platform['Platform'] . "'";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);   
        mysqli_free_result($result);

    }
    redirect_to(url_for('./games/platforms.php') );
}
?>


<?php 
    $sql = "SELECT * FROM Constants";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
?>

<div class="row">
        <div class="col-md-5">
            <h2>All Platforms</h2>  
            <form action="<?php echo url_for('./games/platforms.php'); ?>" method="post">
                <select name="platform" class="form-control" id="platform" method="post">
                 <?php while($platform = mysqli_fetch_assoc($result)){  ?>
                    <option value= "<?php echo h($platform['Platform']); ?>" > <?php echo h($platform['Platform']) ; ?>  </option>
                  <?php }?>
                </select>   
                <br/>
                <label for="update">
                Leave it empty if you want to delete the current platform selected</label>
                <input type="text" class="form-control" name="updated" placeholder="Updated current platform selected" method="post">
                <br/>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
      
      <div class="col-md-1">
      </div>
      
      <div class="col-md-5">
       <h2>New Platform</h2>  
        <form action="<?php echo url_for('./games/newPlatform.php'); ?>" method="post">
            <label for="new">Create new Platform</label>
                <input type="text" class="form-control" name="new" placeholder="New Platform" method="post">
                <br/>
                <button type="submit" class="btn btn-primary">Add</button>
        </form>
      </div>
        
</div>
<br/>
<?php include(SHARED_PATH . '/footer.php'); ?>
