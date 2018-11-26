<?php require_once('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<hr/>
<?php
$id = $_GET['id'] ?? ''; 
if($id == '')   redirect_to(url_for('./members/index.php'));
 
if(is_post_request()){
    echo 'POST';
    $sql = "DELETE FROM Members ";
    $sql.= "WHERE Member_ID='" . $id . "'";
    
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    
    $member = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    
    redirect_to(url_for('./members/index.php'));
} 
   
    $sql = "SELECT * FROM Members ";
    $sql.= "WHERE Member_ID='" . $id . "'";
    
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    
    $member = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    
    ?>
    <h3>Delete member: <i><?php echo h($member['Name']); ?></i>  ?</h3>
    <br/>
    <form action="<?php echo url_for('./members/delete.php?id=' . h(u($member['Member_ID']))); ?>" method="post">
    <div class="row">
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">DELETE</button>
            <a class="btn btn-primary" href="<?php echo url_for('./members/index.php'); ?>">Cancel</a>
        </div>
    </div>
    </form>
<hr/>
<?php include(SHARED_PATH . '/footer.php'); ?>