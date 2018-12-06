<?php require_once('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>


<hr/>
<?php
$id = $_GET['id'] ?? ''; 
if($id == '')   redirect_to(url_for('./rentals/index.php'));


if(is_post_request()){
    
    $sql = "DELETE FROM Rentals ";
    $sql.= "WHERE Rental_ID='" . $id . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $rental = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    
    redirect_to(url_for('./rentals/index.php'));
} 

    
    $result = find_rental_ID($id);
    
    $rental = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

?>
 <h3>Delete rental</h3>
 <h6><b>Title: </b><?php echo h($rental['Title']); ?> </h6>
 <h6><b>Name: </b><?php echo h($rental['Name']); ?> </h6>
 <h6><b>Start Date: </b><?php echo h($rental['Start_Date']); ?> </h6>
 <h6><b>Returned Date: </b><?php if($rental['Returned_Date']==NULL) echo "Not returned yet"; else echo h($rental['Returned_Date']); ?> </h6>
 <h6><b>Extensions Made: </b><?php if($rental['Extensions_Made']==NULL) echo "No"; else echo 'Yes' ?> </h6>
 
    <br/>
    <form action="<?php echo url_for('./rentals/delete.php?id=' . h(u($rental['Rental_ID']))); ?>" method="post">
    <div class="row">
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Delete</button>
            <a class="btn btn-primary" href="<?php echo url_for('./rentals/index.php'); ?>">Cancel</a>
        </div>
    </div>
    </form>
<hr/>
<?php include(SHARED_PATH . '/footer.php'); ?>
