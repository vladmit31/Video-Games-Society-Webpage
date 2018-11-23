<!doctype html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Video Game Society</title>

    <!-- Bootstrap core CSS -->
    <link href="../../public/css/games.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../public/css/gameList.css" rel="stylesheet">

    <style>
    body{
        width:90%;
        margin: 0 auto;
    }
    </style>
    
  </head>


  <body>

    <!-- Navigation -->     
    <form action="<?php echo url_for('../../VGS/public/games/index.php'); ?>" method="post">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="../../public/games/index.php">Video Game Society</a>

        <!-- Search form -->
            <input class="form-control" type="text" name="searchValue" placeholder="Search games" aria-label="Search">
      
      </div>
    </nav>
    </form> 
       <div class="actions">
     <br>
        <a class="btn btn-primary" href="<?php echo url_for('../../VGS/public/login.php'); ?>">Logout</a>
    </div>
  
    <?php  ?>
    
    <body>