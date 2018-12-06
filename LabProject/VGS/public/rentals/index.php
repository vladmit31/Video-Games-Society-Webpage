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
          <p><b>Member name: </b><?php echo h($rental['Name']) ?></p>
          <p><b>Start date :</b> <?php echo h($rental['Start_Date']) ?></p>
          <p><b>Returned date :</b> <?php echo h($rental['Returned_Date']) ?></p>
          <p><b>Extensions Made:</b> <?php echo $rental['Extension_Made'] == '1' ? 'Yes' : 'No'; ?> </p>
          <a class="btn btn-primary" href="<?php echo url_for('./rentals/edit.php?id=' . h(u($rental['Rental_ID']))); ?>">Edit</a> 
          <a class="btn btn-primary" href="<?php echo url_for('./rentals/delete.php?id=' . h(u($rental['Rental_ID']))); ?>">Delete</a> 
          <a class="btn btn-primary" href="<?php echo url_for('./rentals/newBan.php?id=' . h(u($rental['Rental_ID']))); ?>">Ban</a>
       </div>
      </div>


    <hr/>
    <?php }?>
    

<?php include(SHARED_PATH . '/footer.php'); ?>
