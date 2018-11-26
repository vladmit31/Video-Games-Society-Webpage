<?php
    
    function find_all_games() {
        global $db;
    
        $sql = "SELECT * FROM Games ";
        $sql .= "ORDER BY Game_ID DESC";
        //echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
    return $result;
  }
  
    function find_all_rentals() {
        global $db;
    
        $sql = "SELECT * FROM Rentals ";
        $sql .="LEFT JOIN Games ";
        $sql .="ON Rentals.GAME_ID = Games.GAME_ID ";
        $sql .="ORDER BY Rental_ID ASC";
        confirm_result_set($result);
    return $result;
  }

  function find_all_members() {
        global $db;
    
        $sql = "SELECT * FROM Members ";
        $sql .= "ORDER BY Member_ID DESC";

        //echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
    return $result;
  }
?>