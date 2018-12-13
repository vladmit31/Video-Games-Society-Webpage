<?php require_once('private/initialize.php'); ?>

<?php
if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) { // Check if the website uses https
    $uri = 'https://';
} else {
    $uri = 'http://';
}
$uri .= $_SERVER['HTTP_HOST'];
redirect_to('public/index.php');
exit;
?>
