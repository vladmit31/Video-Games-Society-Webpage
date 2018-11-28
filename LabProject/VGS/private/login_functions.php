<?php


  function login($user, $role) {
    session_regenerate_id();
    $_SESSION['role'] = $role;
    $_SESSION['username'] = $user;
    return true;
  }

  // Performs all actions necessary to log out an admin
  function logout() {

     unset($_SESSION['username']);
     unset($_SESSION['role']);
    // session_destroy(); // optional: destroys the whole session
    return true;
  }

  function is_logged_in() {
    return isset($_SESSION['username']);
  }
  
  function is_Secretary_logged_in() {
    if($_SESSION['role'] == 'Secretary')
        return true;
    else return false;
  }

  function require_Secretary_login() {
    if(! is_Secretary_logged_in()){
      redirect_to(url_for('/games/index.php'));
    }else{}
  }
    
  function require_login() {
    if(! is_logged_in()){
      redirect_to(url_for('/login.php'));
    }else{}
  }

?>
