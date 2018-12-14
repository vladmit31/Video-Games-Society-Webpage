<?php
function find_all_games()
{
    global $db;

    $sql = "SELECT * FROM Games ";
    $sql .= "ORDER BY Game_ID DESC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

//Finds rentals with corresponding rental id
function find_rental_ID($id)
{
    global $db;
    $sql = "SELECT Rentals.Rental_ID, Games.Title, Members.Name, Rentals.Start_Date, Rentals.Returned_Date, Rentals.Extension_Made ";
    $sql .= "FROM Rentals,Members, Games ";
    $sql .= "WHERE Games.Game_ID = Rentals.Game_ID AND Members.Member_ID = Rentals.Member_ID AND Rentals.Rental_ID =" . $id;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}


function find_all_rentals()
{
    global $db;
    $sql = "SELECT Rentals.Rental_ID, Games.Title, Members.Name, Rentals.Start_Date, Rentals.Returned_Date, Rentals.Extension_Made ";
    $sql .= "FROM Rentals,Members, Games ";
    $sql .= "WHERE Games.Game_ID = Rentals.Game_ID AND Members.Member_ID = Rentals.Member_ID";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_all_members()
{
    global $db;
    $sql = "SELECT * FROM Members ";
    $sql .= "ORDER BY Member_ID DESC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

//Find member with corresponding Member_ID
function find_member_ban($id)
{
    global $db;
    $sql = "SELECT Games.Title,Bans.Ban_ID, Bans.Reason, Bans.Start_Date, Bans.End_Date FROM Members,Rentals,Bans,Games ";
    $sql .= "WHERE Games.Game_ID = Rentals.Game_ID AND Bans.Rental_ID = Rentals.Rental_ID AND Rentals.Member_ID ='" . $id . "' AND Members.Member_ID='" . $id . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_all_staff()
{
    global $db;
    $sql = "SELECT * FROM Staff ";
    $sql .= "ORDER BY Staff_ID DESC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_member_by_name($name)
{
    global $db;
    $sql = "SELECT * FROM Members ";
    $sql .= "WHERE Name ='" . $name . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_game_by_title($title)
{
    global $db;
    $sql = "SELECT * FROM Games ";
    $sql .= "WHERE Title ='" . $title . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_member_by_id($id)
{
    global $db;
    $sql = "SELECT * FROM Members ";
    $sql .= "WHERE Member_ID =" . $id . "";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_game_by_id($id)
{
    global $db;
    $sql = "SELECT * FROM Games ";
    $sql .= "WHERE Game_ID =" . $id . "";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

?>
