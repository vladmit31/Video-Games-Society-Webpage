<?php require_once('../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

    <link href="./css/games.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/gameList.css" rel="stylesheet">
    
    <style>
    body{
        width:90%;
        margin: 0 auto;
    }
    </style>
    

    
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
           <p><?php echo ($game['Value']) ?></p>
          
        </div>
      </div>


    <hr/>
    <?php }?>

    

<?php include(SHARED_PATH . '/footer.php'); ?>