<?php

    require_once "../init.php";

    $row = findData("tasks",$_POST["id"]);
    if(isset($_POST["id"]) && is_numeric($_POST["id"]) && $row)
    {
        $id = $_POST["id"];

        delete("tasks",$id);
    }