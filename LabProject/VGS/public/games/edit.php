<?php require_once('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<?php 
$id = $_GET['id'] ?? ''; // PHP > 7.0
if($id == '')  redirect_to(url_for('./games/index.php') );
if(is_post_request()) {

  // Handle form values sent by edit.php
    
  $game = [];
  $game['Title'] = $_POST['title'] ?? '';
  $game['Genre'] = $_POST['genre'] ?? '';
  $game['FormatOfGame'] = $_POST['format'] ?? '';
  $game['Value'] = $_POST['value'] ?? '';
  $game['Release_Year'] = $_POST['released_date'] ?? '';
  $game['Description'] = $_POST['description'] ?? '';
  $game['image'] = $_POST['image'] ?? '';
  $game['ratings'] = $_POST['ratings'] ?? '';
  $game['isAvailable'] =  $_POST['isAvailable']=="1" ? '1' : '0';
       
  $sql = "UPDATE Games SET ";
    $sql .= "Title='" . $game['Title'] . "', ";
    $sql .= "Genre='" . $game['Genre'] . "', ";
    $sql .= "FormatOfGame='" . $game['FormatOfGame'] . "', ";
    $sql .= "Value='" . $game['Value'] . "', ";
    $sql .= "Release_Year='" . $game['Release_Year'] . "', ";
    $sql .= "Description='" . $game['Description'] . "', ";
    $sql .= "isAvailable='" . $game['isAvailable'] . "', ";
    $sql .= "ratings='" . $game['ratings'] . "',";
    $sql .= "image='" . $game['image'] . "'";
    $sql .= "WHERE Game_ID='" . $id . "'";


    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
      redirect_to(url_for('./games/show.php?id=' . $id) );
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

    
}

    $sql = "SELECT * FROM Games ";
    $sql.= "WHERE Game_ID='" . $id . "'";
    
    $result = mysqli_query($db, $sql);
    
    confirm_result_set($result);
    
    $game = mysqli_fetch_assoc($result);
    
    if($game==null)
        redirect_to(url_for('./games/index.php') );
        
    mysqli_free_result($result);

?>

<br>
<h3>Edit Game</h3>
<hr/>

<form action="<?php echo url_for('./games/edit.php?id= '. h(u($game['Game_ID'])) ); ?>" method="post">
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="title">Title*</label>
      <input type="text" class="form-control" name="title" placeholder="Title" value="<?php echo h($game['Title']); ?>" method="post" required>
    </div>
   
   <div class="form-group col-md-5">
      <label for="genre">Genre</label>
      <input type="text" class="form-control" name="genre" placeholder="Genre" value="<?php echo h($game['Genre']); ?>" method="post">
    </div>
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="format">Format</label>
      <select name="format" class="form-control" id="formatOfGame" method="post">
        <?php if( ($game['FormatOfGame']) == 'CD'){ ?>
              <option value=""> </option>
              <option selected="selected" value="CD">CD</option>
              <option value="DVD">DVD</option>
              <option value="Cartridge">Cartridge</option>        
        <?php } ?>
        <?php if( ($game['FormatOfGame']) == 'DVD'){ ?>
              <option value=""> </option>
              <option value="CD">CD</option>
              <option selected="selected" value="DVD">DVD</option>
              <option value="Cartridge">Cartridge</option>        
        <?php } ?>
        <?php if( ($game['FormatOfGame']) == 'Cartridge'){ ?>
              <option value=""> </option>
              <option value="CD">CD</option>
              <option value="DVD">DVD</option>
              <option selected="selected" value="Cartridge">Cartridge</option>        
        <?php } ?>
        <?php if( ($game['FormatOfGame']) == ''){ ?>
              <option selected="selected" value=""> </option>
              <option value="CD">CD</option>
              <option value="DVD">DVD</option>
              <option value="Cartridge">Cartridge</option>        
        <?php } ?>
      </select>     
    </div>
    <div class="form-group col-md-2">
      <label for="value">Price*</label>
      <input type="text" class="form-control" name="value" placeholder="0" value="<?php echo h($game['Value']); ?>" method="post" required>
    </div>
     <div class="form-group col-md-2">
      <label for="released_date">Released Date*</label>
      <input type="date" class="form-control" name="released_date" value="<?php echo h($game['Release_Year']); ?>" placeholder="YYYY-MM-DD" required>
    </div>
  </div>
    
    <div class="form-group">
        <div class="form-group col-m-10">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" rows="5" cols="100" method="post"><?php echo h($game['Description']); ?></textarea>
        </div>
   </div>
    
    <div class="form-row">
        <div class="form-group col-m-2">
            <input type="checkbox" name="isAvailable" value="1" method="post" 
                <?php if( ($game['isAvailable']) == '1') echo 'checked';
                ?> 
            >Available<br>
        </div>
    </div>
    
    <div class="form-group">
        <div class="form-group col-m-10">
            <input type="text" class="form-control" name="image" value="<?php echo h($game['image']); ?>" placeholder="Image Link" method="post"><br>
        </div>
    </div>
    
    <div class="form-group">
        <div class="form-group col-m-10">
            <input type="text" class="form-control" value="<?php echo h($game['ratings']); ?>" name="ratings" placeholder="Ratings Link" method="post"><br>
        </div>
    </div>
    
  <button type="submit" class="btn btn-primary">Update</button>
</form>

<hr/>

<?php include(SHARED_PATH . '/footer.php'); ?>