<?php require_once('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<!-- Delete a ban based on the ban ID -->
<?php
if (is_get_request()) {
    $id = $_GET['id'] ?? '';
    if ($id == '') redirect_to(url_for('./members/index.php'));

    $sql = "DELETE FROM Bans ";
    $sql .= "WHERE Ban_ID='" . $id . "'";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    $member = mysqli_fetch_assoc($result);

    mysqli_free_result($result);

    redirect_to(url_for('./members/index.php'));
}
?>
<?php include(SHARED_PATH . '/footer.php'); ?>
