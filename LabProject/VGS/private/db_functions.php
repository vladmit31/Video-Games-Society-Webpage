<?php
    
    function find_all_games() {
        global $db;
    
        $sql = "SELECT * FROM Games ";
        $sql .= "ORDER BY Game_ID ASC";
        //echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
    return $result;
  }
?>