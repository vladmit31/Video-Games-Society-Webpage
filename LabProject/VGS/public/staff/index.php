<?php require_once('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php require_Secretary_login(); ?>


    <h1>All Staff</h1>
    <div class="actions">
        <br>
        <a class="btn btn-primary" href="./new.php">Add new staff</a>
    </div>

    <hr/>


<?php $result = find_all_staff();
while ($staff = mysqli_fetch_assoc($result)) { ?>

    <div class="row">
        <div class="col-md-6">
            <h3><?php echo h($staff['Name']); ?></h3>
            <p>ID: <?php echo h($staff['Staff_ID']) ?></p>
            <p>Role: <?php echo h($staff['Role']) ?></p>

            <div>
                <a class="btn btn-primary"
                   href="<?php echo url_for('./staff/edit.php?id=' . h(u($staff['Staff_ID']))); ?>">Edit</a>
                <a class="btn btn-primary"
                   href="<?php echo url_for('./staff/delete.php?id=' . h(u($staff['Staff_ID']))); ?>">Delete</a>

            </div>
        </div>
    </div>


    <hr/>
<?php } ?>


<?php include(SHARED_PATH . '/footer.php'); ?>