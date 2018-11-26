<?php require_once('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

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
          <p>Tel: <?php echo ($member['Tel']) ?></p>
          <p>Email: <?php echo ($member['Email']) ?></p>
          <p>Extensions Made: <?php echo ($member['Extensions_Made']) ?></p>
          
          <div class= "col">
                <a class="btn btn-primary" href="<?php echo url_for('./members/edit.php?id=' . h(u($member['member_ID']))); ?>">Edit</a> 
                <a class="btn btn-primary" href="<?php echo url_for('./members/delete.php?id=' . h(u($member['member_ID']))); ?>">Delete</a> 
          </div> 
        </div>
      </div>


    <hr/>
    <?php }?>

    

<?php include(SHARED_PATH . '/footer.php'); ?>