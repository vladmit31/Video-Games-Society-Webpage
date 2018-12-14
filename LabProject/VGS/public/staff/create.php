<?php require_once('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php require_Secretary_login(); ?>
<?php
if (is_post_request()) {


    $staff = [];
    $staff['Staff_ID'] = mysqli_real_escape_string($db, $_POST['staffID']) ?? '';
    $staff['Name'] = mysqli_real_escape_string($db, $_POST['name']) ?? '';
    $staff['Role'] = mysqli_real_escape_string($db, $_POST['role']) ?? '';
    $staff['Pass'] = $_POST['password'] ?? '';

    $hashed_password = md5($staff['Pass']);

    $sql = "INSERT INTO Staff ";
    $sql .= "(Staff_ID,Name,Role,Pass) ";
    $sql .= "VALUES (";
    $sql .= "'" . $staff['Staff_ID'] . "',";
    $sql .= "'" . $staff['Name'] . "',";
    $sql .= "'" . $staff['Role'] . "',";
    $sql .= "'" . $hashed_password . "'";
    $sql .= ")";

    if (mysqli_query($db, $sql)) {
        $newID = mysqli_insert_id($db);
        redirect_to(url_for('./staff/index.php'));
    } else {

        echo mysqli_error($db);
        db_disconnect($db);
        //redirect_to(url_for('./members/new.php'));

    }

} else {
    redirect_to(url_for('./staff/index.php'));
}

?>
