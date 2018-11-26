<?php require_once('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

    <h1>Rentals</h1>
     <div class="actions">
     <br>
        <a class="btn btn-primary" href="./new.php">Add Rental</a>
    </div>
    
    <hr/>
    
    <?php 
    if(is_post_request()) {
       $input = $_POST['searchValue'] ?? '';
       
       $sql = "SELECT * FROM Rentals ";
       $sql .= "WHERE Start_Date like '%$input%' || Game_ID like '%$input%' || Member_ID like '%$input%' || Rental_ID like '%$input%' || Returned_Date like '%$input%'";                 
       $sql .= "ORDER BY Member_ID DESC";
        
       $result = mysqli_query($db, $sql);
       confirm_result_set($result);
       
       if($input == '')
            $result = find_all_rentals();
       
    }else  $result = find_all_rentals(); 
    ?>
    
    
    <?php while($rental = mysqli_fetch_assoc($result)){ ?>
    
      <div class="row">
        <div class="col-md-6">
          <h3><?php echo h($rental['Title']); ?></h3>
          <p><?php echo h($rental['Description']) ?></p>
          <p>Start date : <?php echo h($rental['Start_Date']) ?></p>
          <p>Returned date : <?php echo h($rental['Returned_Date']) ?></p>
          <p>Extensions Made: <?php echo h($member['Extensions_Made']) ?></p>
          <a class="btn btn-primary" href="<?php echo url_for('./games/show.php?id=' . h(u($game['Game_ID']))); ?>"> See More</a> 
        </div>
      </div>


    <hr/>
    <?php }?>
    

<?php include(SHARED_PATH . '/footer.php'); ?>
