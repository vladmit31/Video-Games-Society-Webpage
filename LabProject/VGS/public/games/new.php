<?php require_once('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

    <!--Displays a form to add a new game -->
    <br>
    <h3>Add new Game</h3>
    <hr/>
<?php
$sql = "SELECT * FROM Constants";
$result = mysqli_query($db, $sql);
confirm_result_set($result);
?>
    <form action="<?php echo url_for('./games/create.php'); ?>" method="post">
        <div class="form-row">
            <div class="form-group col-md-5">
                <label for="title">Title*</label>
                <input type="text" class="form-control" name="title" placeholder="Title" method="post" required>
            </div>

            <div class="form-group col-md-5">
                <label for="genre">Genre</label>
                <input type="text" class="form-control" name="genre" placeholder="Genre" method="post">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="format">Platform</label>
                <select name="format" class="form-control" id="formatOfGame" method="post">

                    <option value=""></option>
                    <?php while ($platform = mysqli_fetch_assoc($result)) { ?>

                        <option selected
                                value="<?php echo h($platform['Platform']); ?>"> <?php echo h($platform['Platform']); ?>  </option>

                    <?php } ?>

                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="value">Price*</label>
                <input type="text" class="form-control" name="value" placeholder="0" method="post" required>
            </div>
            <div class="form-group col-md-2">
                <label for="released_date">Released Date*</label>
                <input type="text" class="form-control" name="released_date" placeholder="YYYY-MM-DD" required>
            </div>
        </div>

        <div class="form-group">
            <div class="form-group col-m-10">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" rows="5" cols="100" method="post"></textarea>
            </div>

            <div class="form-row">
                <div class="form-group col-m-2">
                    <input type="checkbox" name="isAvailable" value="1" method="post">Available<br>
                </div>
            </div>

            <div class="form-group">
                <div class="form-group col-m-10">
                    <input type="text" class="form-control" name="image" placeholder="Image Link" method="post"><br>
                </div>
            </div>

            <div class="form-group">
                <div class="form-group col-m-10">
                    <input type="text" class="form-control" name="ratings" placeholder="Ratings Link" method="post"><br>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
    </form>


    <hr/>
<?php include(SHARED_PATH . '/footer.php'); ?>