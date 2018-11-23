<?php require_once('../private/initialize.php'); ?>

<?php 

if(is_post_request()) {

  $username = $_POST['username'] ?? '';
  $password = $_POST['pass'] ?? '';

    // $admin = find_admin_by_username($username);
    if($username == 'kotsios'){//$admin) {
   
      if($password== 'pass'){//password_verify($password, $admin['hashed_password'])) {
        echo $username;
        // password matches
        login($username);

        redirect_to(url_for('./games/index.php'));
      } 

    }

}
logout();
?>

<html>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<br><br><br>
<div class="container">
  
  <div class="row" id="pwd-container">
    <div class="col-md-4"></div>
    
    <div class="col-md-4">
      <section class="login-form">
        <form action="<?php echo url_for('./login.php'); ?>" method="post">
        <h1>Video Game Society</h1>
          <br><br>
          <input type="text" name="username" placeholder="Username" required class="form-control input-lg" />
          <br><br>
          <input type="password" class="form-control input-lg" name="pass" placeholder="Password" required />
          <br><br>  
          <div class="pwstrength_viewport_progress"></div>
          
          
          <button type="submit" class="btn btn-lg btn-primary btn-block">Login</button>

          
        </form>
        
        <div class="form-links">
          <a href="#">Back</a>
        </div>
      </section>  
      </div>
      
      <div class="col-md-4"></div>
      

  </div>
    
  
 
</div>

</html>