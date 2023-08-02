<?php

    // create db
    function createDatabsae($databaseName)
    {
        // connect to db
        try
        {

        $mysqli = mysqli_connect("localhost","root","");
        $query = " CREATE DATABASE If NOT EXISTS `$databaseName` ";
        $result = mysqli_query($mysqli,$query);

        }
        catch(Exception $e)
        {
            die("Error: " . $e->getMessage());
        }
        finally
        {
            mysqli_close($mysqli);
        }
  
    }


    //connect to to database

    function getConnection()
    {
        try
        {

            $mysqli = mysqli_connect("localhost","root","","todoapp");

        }
        catch(Exception $e)
        {
            die("Error: " . $e->getMessage());
        }

        return $mysqli;

    }

    //insert in db

    // insert(
    //     [
    //         "title" => '$title',
    //     ]
    // )

    // insert in db 
    function insert($table,$data)
    {

        try
        {
            $mysqli = getConnection();
        
            
            $names = ""; // name in query - must define them to fn
            $values = ""; // value in query
            foreach($data as $key => $value)
            {
                $names .= "`$key`,";
                $values .= "'$value',";
            }

            $names = substr($names,0,-1);
            $values = substr($values,0,-1);
                
            $query = " INSERT INTO `$table` ($names) VALUES ($values) ";
            $result = mysqli_query($mysqli,$query);
            

            // to check result 
            if(mysqli_affected_rows($mysqli) > 0)
            {
                return "Added successfully";
            }
            else
            {
                // $_SESSION["errors"][] = "Error : " . mysqli_error($mysqli);
                redirect(URL);               
            }
            
    
        }
        catch(Exception $e)
        {
            die("Error: " . $e->getMessage());
        }
        finally
        {
            mysqli_close($mysqli);
        }


       
    }


    // get data from db

    function read($table,$columns="*") // columns : if u need specefic column - optional default value *  
    {
        try
        {
            $mysqli = getConnection();
            $query = " SELECT $columns FROM `$table` ";
            $result = mysqli_query($mysqli,$query);
            $data = [];

                if(mysqli_num_rows($result))
                {
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $data[] = $row;
                    }

                }
                

        }
        catch(Exception $e)
        {
            die("Error: " . $e->getMessage());
        }
        finally
        {
            mysqli_close($mysqli);
        }


        // its better to  return empty array on check error
        return $data;  

    }

    // delete from db
    function delete($table,$id)
    {

        try
        {

            $mysqli = getConnection();
            $query = " DELETE FROM `$table` WHERE `id` = '$id' ";
            $result = mysqli_query($mysqli,$query);
            if(mysqli_affected_rows($mysqli) > 0 )
            {
                $_SESSION["success"] =  "deleted successfully"; 
                redirect(URL);               
            }
            else
            {
                // $_SESSION["errors"][] = "No changes done";
                redirect(URL);               
            }



        }
        catch(Exception $e)
        {
            $_SESSION["errors"][] = "Error : " . $e->getMessage();
            redirect(URL);
            
        }
        finally
        {
            mysqli_close($mysqli);
        }

    
    }

    // search in db
    function findData($table,$id)
    {
        try
        {
            $mysqli = getConnection();
            $query = " SELECT * FROM `$table` WHERE `id`='$id' ";
            $result = mysqli_query($mysqli,$query);
            if(mysqli_num_rows($result))
            {
                return mysqli_fetch_assoc($result);
            }
            else
            {
                $_SESSION["errors"][] = "data not exists";
                redirect(URL);
            }



        }
        catch(Exception $e)
        {
            $_SESSION["errors"][] = "Error : " . $e->getMessage();
            redirect(URL);
        }
        finally
        {
            mysqli_close($mysqli);

        }



    }


    // update in db

    function update($query)
    {
        try
        {
            $mysqli = getConnection();
            $result = mysqli_query($mysqli,$query);
          
            if(mysqli_affected_rows($mysqli) > 0)
            {
                $_SESSION["success"] = "Data updated successfully";
                redirect(URL);
            }
            else
            {
                $_SESSION["errors"][] = "No changes done";
                redirect(URL);
            } 

        }
        catch(Exception $e)
        {
            $_SESSION["errors"][] = "Error : " . $e->getMessage();
            redirect(URL);
        }
        finally
        {
            mysqli_close($mysqli);
        }


    }
  