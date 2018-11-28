<?php require_once('../private/initialize.php'); ?>

<?php 

if(is_post_request()) {

  $username = $_POST['username'] ?? '';
  $password = $_POST['pass'] ?? '';

    $sql = "SELECT * FROM Staff ";
    $sql .= "WHERE Staff_ID LIKE '" . $username . "' ";
    $sql .= "LIMIT 1";
    

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    $staff = mysqli_fetch_assoc($result); 
    mysqli_free_result($result);
   
    if($staff){ 
      if(password_verify($password, $staff['Pass'])) { //$password == $staff['Pass']){
        login($username, $staff['Role']);
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