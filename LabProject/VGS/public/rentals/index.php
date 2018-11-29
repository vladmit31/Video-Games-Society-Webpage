<?php require_once('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

    <h1>Rentals</h1>
     <div class="actions">
     <br>
        <a class="btn btn-primary" href="./new.php">Add Rental</a>
    </div>
    
    <hr/>
    
    <?php  $result = find_all_rentals();    ?>
    
    
    <?php while($rental = mysqli_fetch_assoc($result)){ ?>
    
      <div class="row">
        <div class="col-md-6">
          <h3><?php echo h($rental['Title']); ?></h3>
          <p><?php echo h($rental['Name']) ?></p>
          <p>Start date : <?php echo h($rental['Start_Date']) ?></p>
          <p>Returned date : <?php echo h($rental['Returned_Date']) ?></p>
          <p>Extensions Made: <?php echo h($member['Extensions_Made']) ?></p>
          <a class="btn btn-primary" href="<?php echo url_for('./games/show.php?id=' . h(u($rental['Rental_ID']))); ?>"> See More</a> 
          <a class="btn btn-primary" href="<?php echo url_for('./rentals/delete.php?id=' . h(u($rental['Rental_ID']))); ?>">Delete</a> 
        </div>
      </div>


    <hr/>
    <?php }?>
    

<?php include(SHARED_PATH . '/footer.php'); ?>
