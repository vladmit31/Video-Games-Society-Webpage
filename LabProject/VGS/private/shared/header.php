<!-- The header of almost every page
     Contains the serach button for searching games and the buttons
     that navigate to the other pages
 -->

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Video Game Society</title>


    <link href="../../public/css/games.css" rel="stylesheet">

    <link href=" /gameList.css" rel="stylesheet">

    <style>
        body {
            width: 90%;
            margin: 0 auto;
        }
    </style>

</head>


<body>

    <form action="<?php echo url_for('../public/games/index.php'); ?>" method="post">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="../../public/games/index.php">Video Game Society</a>

            <input class="form-control" type="text" name="searchValue" placeholder="Search games" aria-label="Search">

        </div>
    </nav>
</form>


<div class="row">
    <div class="col">
        <div class="actions">
            <br><br><br>
            <a class="btn btn-primary" href="<?php echo url_for('../public/games/index.php'); ?>">Games</a>
            <a class="btn btn-primary" href="<?php echo url_for('../public/members/index.php'); ?>">Members</a>
            <a class="btn btn-primary" href="<?php echo url_for('../public/rentals/index.php'); ?>">Rentals</a>
            <a class="btn btn-primary" href="<?php echo url_for('../public/staff/index.php'); ?>">Staff</a>
            <a class="btn btn-primary" href="<?php echo url_for('../public/login.php'); ?>">Logout</a>
        </div>

    </div>
</div>

<?php require_login(); ?>

<b><?php echo 'Username: '; ?></b> <?php echo $_SESSION['username']; ?>
<br>
<b><?php echo 'Role: '; ?></b> <?php echo $_SESSION['role']; ?>
<br>

<body>