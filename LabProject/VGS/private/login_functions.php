<?php


  function login($user) {
    session_regenerate_id();

    $_SESSION['username'] = $user;
    return true;
  }

  // Performs all actions necessary to log out an admin
  function logout() {

     unset($_SESSION['username']);
    
    // session_destroy(); // optional: destroys the whole session
    return true;
  }

  function is_logged_in() {

    return isset($_SESSION['username']);
  }


  function require_login() {
    if(! is_logged_in()){
      redirect_to(url_for('/login.php'));
    }else{}

  }

?>
