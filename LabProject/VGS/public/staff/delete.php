<?php require_once('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php require_Secretary_login(); ?>
<hr/>
<?php
$id = $_GET['id'] ?? ''; 
if($id == '')   redirect_to(url_for('./staff/index.php'));
 
if(is_post_request()){

    $sql = "DELETE FROM Staff ";
    $sql.= "WHERE Staff_ID='" . $id . "'";
    
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    
    $staff = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    
    redirect_to(url_for('./staff/index.php'));
} 
   
    $sql = "SELECT * FROM Staff ";
    $sql.= "WHERE Staff_ID='" . $id . "'";
    
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    
    $staff = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    
    ?>
    <h3>Delete staff: <i><?php echo h($staff['Name']); ?></i>  ?</h3>
    <br/>
    <form action="<?php echo url_for('./staff/delete.php?id=' . h(u($staff['Staff_ID']))); ?>" method="post">
    <div class="row">
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">DELETE</button>
            <a class="btn btn-primary" href="<?php echo url_for('./staff/index.php'); ?>">Cancel</a>
        </div>
    </div>
    </form>
<hr/>
<?php include(SHARED_PATH . '/footer.php'); ?>