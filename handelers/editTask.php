<?php

    require_once "../init.php";
    $errors = [];
    $success = "";

   if(checkRequestMethod("POST") && isset($_POST["id"]))
   {

        $title = sanitizeInput($_POST["title"]);

        if(requiredVal($title))
        {
            $errors[] = "todo is Required";
        }elseif(minVal($title,3))
        {
            $errors[] = "todo must be greater than 3 chars";

        }elseif(maxVal($title,20))
        {
            $errors[] = "todo must be smaller than 20 chars";
        }

        if(checkError($errors))
        {
            $_SESSION["errors"] = $errors;
            $_SESSION["id"] = $_POST["id"];
            redirect(URL . "edit.php");
        }
        else
        {
            
            $query = " UPDATE `tasks` SET `title` = '$title' WHERE `id` = '$_POST[id]' "; 
            update($query);
            
        }
   }



