<?php require_once('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

     <div class="actions">
     <br>
        <a class="btn btn-primary mx-sm-4" href="./new.php">Add Rental</a>
    </div>
    
    <hr/>
    <?php $result = find_all_rentals(); ?>
    <?php while($rental = mysqli_fetch_assoc($result)){ ?>
    
        <div class="row">
        <div class="col-md-7">
        </div>
        <div class="col-md-10 mx-auto">
        <h3><?php echo h($rental['Title']); ?></h3>
          <p><?php echo h($rental['Description']) ?></p>
          <p><?php echo h($rental['Start_Date']) ?></p>
          <p><?php echo h($rental['Returned_Date']) ?></p>
          <a class="btn btn-primary" href="<?php echo url_for('./games/show.php?id=' . h(u($game['Game_ID']))); ?>"> See More</a> 
        </div>
      </div>


    <hr/>
    <?php }?>

    

<?php include(SHARED_PATH . '/footer.php'); ?>