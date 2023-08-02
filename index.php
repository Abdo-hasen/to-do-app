<?php
require_once "init.php";
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

    <!--  check error -->
  
    <?php
        if(isset($_SESSION["errors"])) : 
            foreach($_SESSION["errors"] as $error): 
    ?>

    <div class="alert alert-danger text-center">

            <?php echo $error; ?>
    </div>

    <?php
            endforeach;
            unset($_SESSION["errors"]);
        endif;
    ?>

        
    <!-- check success -->

    <?php
    if(isset($_SESSION["success"])):
    ?>

    <div class="alert alert-success text-center">
    <?=  $_SESSION["success"];  ?>
    </div>

    <?php
    unset($_SESSION["success"]);
    endif;
    ?>

    <!-- get data from db -->

    <?php
       $data = read("tasks"); 
    ?>



    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <form action="handelers/storeTask.php" method="POST" class="form border p-2 my-5">
                    <input type="text" name="title" class="form-control my-3 border border-success" placeholder="add new todo">
                    <input type="submit" value="Add" class="form-control btn btn-primary my-3 " placeholder="add new todo">
                </form>
            </div>
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Task</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php foreach($data as $row): ?>
                            <tr>
                                    <td><?= $row["id"]; ?></td>
                                    <td><?= $row["title"]; ?></td>
                                    <td>
                                            <form action="edit.php" method="POST">
                                                <input type="hidden" name="id" value="<?=  $row["id"]; ?>">
                                                <button type="submit" class="btn btn-info"><i class="fa-solid fa-edit"></i></button>
                                            </form>
                                    </td>
                                    <td>
                                            <form action="handelers/deleteTask.php" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                <button type="submit"  class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                    </td>

                                 
                            </tr>
                            <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="script.js"></script>
</body>

</html>