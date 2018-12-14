<?php require_once('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>


    <br>
    <h3>Add new Rental</h3>
    <hr/>

<?php $resultMember = find_all_members();
$resultGame = find_all_games();
?>

    <form action="<?php echo url_for('./rentals/create.php'); ?>" method="post">
        <div class="form-row">
            <div class="form-group col-md-5">
                <label for="name">Member*</label>
                <select name="member" class="form-control" id="member" method="post">
                    <?php while ($member = mysqli_fetch_assoc($resultMember)) { ?>
                        <?php $temp = h($member['Name']); ?>
                        <option value="<?php echo $temp; ?>"> <?php echo h($member['Name']); ?>  </option>

                    <?php } ?>
                </select>
            </div>

            <div class="form-group col-md-5">
                <label for="game">Game*</label>
                <select name="game" class="form-control" id="game" method="post">
                    <?php while ($game = mysqli_fetch_assoc($resultGame)) { ?>

                        <option value="<?php echo h($game['Title']); ?>"> <?php echo h($game['Title']); ?>  </option>

                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="start">Start_Date</label>
                <input type="date" class="form-control" name="start" method="post" required>
            </div>
            <div class="form-group col-md-3">
                <label for="end">Returned_Date</label>
                <input type="date" class="form-control" name="end" method="post" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="extensions_made">Extensions Made</label>
                <input type="checkbox" name="extension" value="1" method="post">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>


    <hr/>
<?php include(SHARED_PATH . '/footer.php'); ?>