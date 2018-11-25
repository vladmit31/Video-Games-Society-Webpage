<?php require_once('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<hr/>
<?php
$id = $_GET['id'] ?? ''; 
if($id == '')   redirect_to(url_for('./games/index.php'));
 
if(is_post_request()){
    
    $sqlTemp = "DELETE FROM Rentals ";
    $sqlTemp .= "WHERE Game_ID='" . $id . "'";
    $resultTemp = mysqli_query($db, $sqlTemp);

    confirm_result_set($resultTemp);
    
    $sql = "DELETE FROM Games ";
    $sql.= "WHERE Game_ID='" . $id . "'";

    $result = mysqli_query($db, $sql);

    confirm_result_set($result);

    $game = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    
    redirect_to(url_for('./games/index.php'));
} 
   
    $sql = "SELECT * FROM Games ";
    $sql.= "WHERE Game_ID='" . $id . "'";
    
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    
    $game = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    
    ?>
    <h3>Delete <i><?php echo h($game['Title']); ?></i>  ?</h3>
    <br/>
    <form action="<?php echo url_for('./games/delete.php?id=' . h(u($game['Game_ID']))); ?>" method="post">
    <div class="row">
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">DELETE</button>
            <a class="btn btn-primary" href="<?php echo url_for('./games/index.php'); ?>">Cancel</a>
        </div>
    </div>
    </form>
<hr/>
<?php include(SHARED_PATH . '/footer.php'); ?>