<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Video Game Society'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>
 
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4"> The VGS' games </h1>
        

   
            
      <!-- Demonstration that we can create an element in one line-->
      
        <?php include(PRIVATE_PATH. '/listItem/listItem.php'); ?><hr>
      <?php $sql = "SELECT * FROM Games ";
            &result = mysql_query()
      ?>



        
      <!-- Pagination -->
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>

    </div>
    <!-- /.container -->
    
    

<?php include(SHARED_PATH . '/footer.php'); ?>