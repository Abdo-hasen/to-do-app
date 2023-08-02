<?php

    require_once "../init.php";

    
    // create db

    createDatabsae("todoapp"); 
       



    // create tables

    $mysqli = getConnection();

    try
    { 
        $query = " CREATE TABLE IF NOT EXISTS `tasks`
        (
            `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
            `title` VARCHAR(255) NOT NULL
        ); ";

        $result = mysqli_query($mysqli,$query);
    }
    catch(Exception $e)
    {
        die("Error: " . $e->getMessage());
    }
   
    mysqli_close($mysqli);

    








