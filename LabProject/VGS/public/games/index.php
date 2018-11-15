<?php require_once('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

     <div class="actions">
     <br>
        <a class="btn btn-primary" href="./new.php">Add Game</a>
    </div>
    
    <hr/>
    <?php $result = find_all_games(); ?>
    <?php while($game = mysqli_fetch_assoc($result)){ ?>
    
        <div class="row">
        <div class="col-md-7">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" width="800" height="400" src="http://www.powerpyx.com/wp-content/uploads/assassins-creed-odyssey-wallpaper.jpg"  alt="">
          </a>
        </div>
        <div class="col-md-5">
          <h3><?php echo h($game['Title']); ?></h3>
          <p><?php echo h($game['Description']) ?></p>

          <a class="btn btn-primary" href="<?php echo url_for('./games/show.php?id=' . h(u($game['Game_ID']))); ?>"> See More</a> 
        </div>
      </div>


    <hr/>
    <?php }?>

    

<?php include(SHARED_PATH . '/footer.php'); ?>