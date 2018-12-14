<?php require_once('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<!-- Edit a rental  -->
<?php
$id = $_GET['id'] ?? ''; // PHP > 7.0
if ($id == '') redirect_to(url_for('./rentals/index.php'));
if (is_post_request()) {

    // Handle form values sent by new.php
    $rentals = [];
    $rentals['member'] = mysqli_real_escape_string($db, $_POST['member']) ?? '';
    $rentals['game'] = mysqli_real_escape_string($db, $_POST['game']) ?? '';
    $rentals['start'] = mysqli_real_escape_string($db, $_POST['start']) ?? '';
    $rentals['end'] = mysqli_real_escape_string($db, $_POST['end']) ?? '';
    $rentals['extension'] = $_POST['extension'] == "1" ? '1' : '0';

    $resultM = find_member_by_name($rentals['member']);
    $memberID = mysqli_fetch_assoc($resultM);

    $resultG = find_game_by_title($rentals['game']);
    $gameID = mysqli_fetch_assoc($resultG);

    $sql = "UPDATE Rentals SET ";
    $sql .= "Member_ID=" . $memberID['Member_ID'] . ",";
    $sql .= "Game_ID=" . $gameID['Game_ID'] . ",";
    $sql .= "Start_Date='" . $rentals['start'] . "',";
    $sql .= "Returned_Date='" . $rentals['end'] . "',";
    $sql .= "Extension_Made='" . $rentals['extension'] . "' ";
    $sql .= "WHERE Rental_ID='" . $id . "'";

    if (mysqli_query($db, $sql)) {
        $newID = mysqli_insert_id($db);
        redirect_to(url_for('./rentals/index.php'));
    } else {

        echo mysqli_error($db);
        db_disconnect($db);
        //redirect_to(url_for('./members/new.php'));

    }

}

$sql = "SELECT * FROM Rentals ";
$sql .= "WHERE Rental_ID='" . $id . "'";

$result = mysqli_query($db, $sql);

confirm_result_set($result);

$rental = mysqli_fetch_assoc($result);

if ($rental == null)
    redirect_to(url_for('./rental/index.php'));

mysqli_free_result($result);

$resultMember = find_member_by_id($rental['Member_ID']);
$theMember = mysqli_fetch_assoc($resultMember);

$resultGame = find_game_by_id($rental['Game_ID']);
$theGame = mysqli_fetch_assoc($resultGame);

$resultMembers = find_all_members();
$resultGames = find_all_games();
?>


<br>
<h3>Edit Rental</h3>
<hr/>

<form action="<?php echo url_for('./rentals/edit.php?id= ' . h(u($rental['Rental_ID']))); ?>" method="post">
    <div class="form-row">
        <div class="form-group col-md-5">
            <label for="name">Member*</label>
            <select name="member" class="form-control" id="member" method="post">
                <?php while ($member = mysqli_fetch_assoc($resultMembers)) { ?>
                    <?php $temp = h($member['Name']); ?>
                    <?php if ($member['Member_ID'] == $theMember['Member_ID']) {
                        ?>
                        <option selected value="<?php echo $temp; ?>"> <?php echo h($member['Name']); ?>  </option>
                    <?php } else {
                        ?>
                        <option value="<?php echo $temp; ?>"> <?php echo h($member['Name']); ?>  </option>

                    <?php }
                } ?>
            </select>
        </div>

        <div class="form-group col-md-5">
            <label for="game">Game*</label>
            <select name="game" class="form-control" id="game" method="post">
                <?php while ($game = mysqli_fetch_assoc($resultGames)) { ?>

                    <?php if ($game['Game_ID'] == $theGame['Game_ID']) {
                        ?>
                        <option selected
                                value="<?php echo h($game['Title']); ?>"> <?php echo h($game['Title']); ?>  </option>
                    <?php } else {
                        ?>
                        <option value="<?php echo h($game['Title']); ?>"> <?php echo h($game['Title']); ?>  </option>

                    <?php }
                } ?>
            </select>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="start">Start_Date</label>
            <input type="date" class="form-control" name="start" value="<?php echo h($rental['Start_Date']); ?>"
                   method="post" required>
        </div>
        <div class="form-group col-md-3">
            <label for="end">Returned_Date</label>
            <input type="date" class="form-control" name="end" value="<?php echo h($rental['Returned_Date']); ?>"
                   method="post" required>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="extensions_made">Extensions Made</label>
            <input type="checkbox" name="extension" <?php if (($rental['Extension_Made']) == '1') echo 'checked'; ?>
                   value="1" method="post">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>


<hr/>
<?php include(SHARED_PATH . '/footer.php'); ?>
