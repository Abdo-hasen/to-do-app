<?php

    // validation by error  :

    // reqired field - cannot be empty
    function requiredVal($input)
    {
        if(empty($input))
        {
            return true; // يعني ادخل هنا
        }

        return false; // يعني ادخل في else
    }



    // minmum length for value
    
    function minVal($input,$length)
    {
        if(strlen($input) < $length)
        {
            return true;
        }

        return false;
    }

  
    // maximum val

    function maxVal($input,$length)
    {
        if(strlen($input)> $length)
        {
            return true;
        }
        return false;
    }
