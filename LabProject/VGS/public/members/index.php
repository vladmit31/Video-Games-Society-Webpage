<?php require_once('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

   <h1>All Members</h1>
     <div class="actions">
     <br>
        <a class="btn btn-primary" href="./new.php">Add Member</a>
    </div>
    
    <hr/>
    
    
    <?php $result = find_all_members(); 
    while($member = mysqli_fetch_assoc($result)){ ?>
    
      <div class="row">
        <div class="col-md-6">
          <h3><?php echo h($member['Name']); ?></h3>
          <p>Tel: <?php echo h($member['Tel']) ?></p>
          <p>Email: <?php echo h($member['Email']) ?></p>
          <p>Extensions Made: <?php echo h($member['Extensions_Made']) ?></p>
          
          <div>
                <a class="btn btn-primary" href="<?php echo url_for('./members/edit.php?id=' . h(u($member['Member_ID']))); ?>">Edit</a> 
                <a class="btn btn-primary" href="<?php echo url_for('./members/delete.php?id=' . h(u($member['Member_ID']))); ?>">Delete</a> 
        
         </div> 
        </div>
      </div>


    <hr/>
    <?php }?>

    

<?php include(SHARED_PATH . '/footer.php'); ?>