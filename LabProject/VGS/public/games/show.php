<?php require_once('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<hr/>

<?php
// $id = isset($_GET['id']) ? $_GET['id'] : '1';
$id = $_GET['id'] ?? '1'; // PHP > 7.0

$sql = "SELECT * FROM Games ";
$sql.= "WHERE Game_ID='" . $id . "'";

$result = mysqli_query($db, $sql);
confirm_result_set($result);

$game = mysqli_fetch_assoc($result);
mysqli_free_result($result);

?>

    
<div class="col">
        <div class="col-md-5">
          <img height="300" width="400" src="<?php echo $game['image']; ?>" >
          <h3><?php echo h($game['Title']); ?></h3>
          <p><?php echo h($game['Description']) ?></p>
          <p><?php echo 'Genre: ' . h($game['Genre']); ?></p>
          <p><?php echo 'Release Year: ' . h($game['Release_Year']); ?></p>
          <p><?php echo 'Format: ' . h($game['FormatOfGame']); ?></p>
          <p><?php echo 'Price: ' . '$'. h($game['Value']); ?></p>
          <p><b><?php echo $game['isAvailable'] == '1' ? 'Available' : 'Not Available'; ?></b></p>
          <p><a href="<?php echo ($game['ratings']) ?>">Rating link</a></p>
          <a class="btn btn-primary" href="<?php echo url_for('./games/index.php'); ?>">Back to List</a> 
        </div>
</div>

 
 <hr/>
<?php include(SHARED_PATH . '/footer.php'); ?>