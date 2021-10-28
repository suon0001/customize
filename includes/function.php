<?php

function check_login($con)
{

    if (isset($_SESSION['login_id'])) {
        $username =$_SESSION['username'];
        $query = "SELECT * FROM login WHERE username =  '$username' LIMIT 1";

        $result = mysqli_query($con, $query);
        if($result && mysqli_num_rows($result) > 0){
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }


}

function random_num($length)
    {
        $text = "";
        if($length < 5)
        {
            $length = 5;
        }

        $len = rand(4, $length);

        for ($i = 0; $i < $len; $i++)
        {
            $text .= rand(0,9);
        }

        return $text;
    }

