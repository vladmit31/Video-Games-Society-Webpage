<?php require_once('./private/initialize.php'); 
?>

<!doctype html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Video Game Society</title>

    <link href="./public/css/games.css" rel="stylesheet">


    <link href="./public/css/gameList.css" rel="stylesheet">


    <style>
    body{
        width:90%;
        margin: 0 auto;
    }
    </style>
    
  </head>


  <body>

    <form action="<?php echo url_for('./index.php'); ?>" method="post">
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="./index.php">Video Game Society</a>
        
            <input class="form-control" type="text" name="searchValue" placeholder="Search games(Title, Genre, Description)" aria-label="Search">
      
      </div>
    </nav>
    </form> 
    
    <body>
    <div class="actions">
     <br>
        <a class="btn btn-primary" href="./public/login.php">Login</a>
    </div>
    
   <br>
    

    
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
    
      <div class="row" style="margin:0px auto">
        <div class="col-md-6" style="margin:0px auto">
          <h3><?php echo h($game['Title']); ?></h3>
          <p><b>Type:</b> <?php echo ($game['Genre']) ?></p>
          <p><b>Release Year:</b> <?php echo ($game['Release_Year']) ?></p>
          <p><b>Description:</b> <?php echo ($game['Description']) ?></p>
          <p><b>Format:</b> <?php echo ($game['FormatOfGame']) ?></p>
           <p><b>Price:</b> <?php echo ($game['Value']) ?>£</p>
           <p><b>Is it available:</b> <?php if(($game['isAvailable']) == true){echo "Yes";}else{echo "No";}?></p>
           <h6 style="color:Blue">WARNING! If you LOST or DAMAGE the game, you will need to pay the fee!</h6>
           
        </div>
      </div>


    <hr/>
    <?php }?>
    

<?php include(SHARED_PATH . '/footer.php'); ?>