<?php require_once('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

   <h1>All Members</h1>
     <div class="actions">
     <br>
        <a class="btn btn-primary" href="./new.php">Add Member</a>
    </div>
    
    <hr/>
    
    <?php 
    if(is_post_request()) {
       $input = $_POST['searchValue'] ?? '';
       
       $sql = "SELECT * FROM Members ";
       $sql .= "WHERE Title like '%$input%' || Genre like '%$input%' || Description like '%$input%'";                 
       $sql .= "ORDER BY Member_ID DESC";
        
       $result = mysqli_query($db, $sql);
       confirm_result_set($result);
       
       if($input == '')
            $result = find_all_members();
       
    }else  $result = find_all_members(); 
    ?>
    
    <?php while($member = mysqli_fetch_assoc($result)){ ?>
    
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