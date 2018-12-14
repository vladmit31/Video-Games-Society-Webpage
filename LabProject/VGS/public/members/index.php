<?php require_once('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<!-- Shows all members -->

<h1>All Members</h1>
<div class="actions">
    <br>
    <a class="btn btn-primary" href="./new.php">Add Member</a>
</div>

<hr/>


<?php $result = find_all_members();

while ($member = mysqli_fetch_assoc($result)) { ?>

    <div class="row">
        <div class="col-md-2">
            <h3><?php echo h($member['Name']); ?></h3>
            <p>Tel: <?php echo h($member['Tel']) ?></p>
            <p>Email: <?php echo h($member['Email']) ?></p>
            <p>Extensions Made: <?php echo h($member['Extensions_Made']) ?></p>

            <div>
                <a class="btn btn-primary"
                   href="<?php echo url_for('./members/edit.php?id=' . h(u($member['Member_ID']))); ?>">Edit</a>
                <a class="btn btn-primary"
                   href="<?php echo url_for('./members/delete.php?id=' . h(u($member['Member_ID']))); ?>">Delete</a>
            </div>
        </div>

        <div class="col-md-10">
            <?php $bansRe = find_member_ban($member['Member_ID']);
            while ($ban = mysqli_fetch_assoc($bansRe)) {

                if ($ban['End_Date'] == Null) $end = "Null";
                else $end = $ban['End_Date'];

                if ($end != "Null") {
                    if ($end > date("Y-m-d")) echo "<b>Member is Banned</b>";
                    else echo "<b>Member is NOT Banned</b>";
                }//else echo "<b>Member is Banned</b>"
                ?>
                <p><?php echo "<b>Game: </b>" . h($ban['Title']) . " <b>Reason: </b>" .
                        h($ban['Reason']) . " <b>Start Date: </b>" . h($ban['Start_Date'])
                        . " <b>End Date: </b>" . $end; ?>

                    <a class="btn btn-primary"
                       href="<?php echo url_for('./members/editBan.php?id=' . h(u($ban['Ban_ID']))); ?>">Edit</a>
                    <a class="btn btn-primary"
                       href="<?php echo url_for('./members/deleteBan.php?id=' . h(u($ban['Ban_ID']))); ?>">Delete</a>

                </p>

            <?php } ?>
        </div>
    </div>

    <hr/>
<?php } ?>



<?php include(SHARED_PATH . '/footer.php'); ?>
