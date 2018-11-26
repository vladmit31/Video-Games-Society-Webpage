<?php require_once('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php require_login(); ?>

   <h1>All Games</h1>
     <div class="actions">
     <br>
        <a class="btn btn-primary" href="./new.php">Add Game</a>
    </div>
    
    <hr/>
    
    <?php 
    if(is_post_request()) {
       $input = $_POST['searchValue'] ?? '';
       
       $sql = "SELECT * FROM Games ";
       $sql .= "WHERE Title like '%$input%' || Genre like '%$input%' || Description like '%$input%'";                 
       $sql .= "ORDER BY Game_ID DESC";
        
       $result = mysqli_query($db, $sql);
       confirm_result_set($result);
       
       if($input == '')
            $result = find_all_games();
       
    }else  $result = find_all_games(); 
    ?>
    
    <?php while($game = mysqli_fetch_assoc($result)){ ?>
    
      <div class="row">
        <div class="col-md-6">
          <h3><?php echo h($game['Title']); ?></h3>
          <p><?php echo ($game['Description']) ?></p>
          
          <div class= "col">
                <a class="btn btn-primary" href="<?php echo url_for('./games/show.php?id=' . h(u($game['Game_ID']))); ?>"> See More</a> 
                <a class="btn btn-primary" href="<?php echo url_for('./games/edit.php?id=' . h(u($game['Game_ID']))); ?>">Edit</a> 
                <a class="btn btn-primary" href="<?php echo url_for('./games/delete.php?id=' . h(u($game['Game_ID']))); ?>">Delete</a> 
          </div> 
        </div>
      </div>


    <hr/>
    <?php }?>

    

<?php include(SHARED_PATH . '/footer.php'); ?>