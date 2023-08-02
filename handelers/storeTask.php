<?php

    // include files
    require_once "../init.php";

    // declear needed variables
    $success= [];
    $errors= [];

    // check request method
    if(checkRequestMethod("POST") && checkInput($_POST,"title"))
    {
        //  receive data after sanitize 
        $title = sanitizeInput($_POST["title"]); 

        //valiadion of data
        if(requiredVal($title))
        {
            $errors[] = "Todo is Required";
        }
        elseif(minVal($title,3))
        {
            $errors[] = "Todo must be greater than 3 chars";
        }
        elseif(maxVal($title,20))
        {
            $errors[] = "Todo must be smaller than 20 chars";
        }

        // check for errors and success
        if(checkError($errors))
        {
            $_SESSION["errors"] = $errors;
            redirect(URL);
        }
        else
        {
            $success = insert("tasks",
            [
                "title" => $title
            ]
            );

            $_SESSION["success"] = $success;
            redirect(URL);
        }
        
    }
    else
    {
        redirect(URL);
    }