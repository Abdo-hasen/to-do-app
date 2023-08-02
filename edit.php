<?php

    require_once "init.php";

    if(isset($_POST["id"]) && is_numeric($_POST["id"]))
    {
        $id = $_POST["id"];
       
    }
    elseif(isset($_SESSION["id"]) && is_numeric($_SESSION["id"]))
    {
        $id = $_SESSION["id"];
       
    }
    else
    {
        $_SESSION["errors"][] = "Data Not Exists";
        redirect(URL);
    }

    $row = findData("tasks",$id);




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">    
    <title>Document</title>
</head>
<body>
    

    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <form action="handelers/editTask.php" method="POST" class="form border p-2 my-5">
                    <?php

                        if(isset($_SESSION["errors"])):
                             foreach($_SESSION["errors"] as $error): 
                          
                    ?>
                        <div class="alert alert-danger text-center">
                                
                                <?= $error;  ?>
                        </div> 

                    <?php

                             endforeach;
                            unset($_SESSION["errors"]);
                        endif;     

                    ?>

                    <input type="text" name="title"   value="<?= $row["title"]; ?>"  class="form-control my-3 border border-success" placeholder="add new todo">

                    <input type="hidden" name="id" value="<?= $row["id"]; ?>">

                    <input type="submit" value="Save"  class="form-control btn btn-primary my-3 " placeholder="add new todo">
                </form>
            </div>
          
        </div>
    </div>


          

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="script.js"></script>
</body>
</html>




