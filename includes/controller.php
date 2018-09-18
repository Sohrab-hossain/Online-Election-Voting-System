<?php

        print '<h2><a href="?controller='.$controller.'">'.ucwords(str_replace("_", " ", $controller)).'</a> |
        <i>'.ucwords(str_replace("_", " ",$view)).'</i></h2>';

        if(in_array(strtolower($controller), $adminController))
        {
            if(isset($_SESSION['type']))
            {
                if($_SESSION['type'] == "SA")
                {
                    include('views/'.$controller.'/'.$view.".php");
                }
                else
                {
                    print '<span class="error">You have to login with admin account to view this content</span>';
                    include('views/account/login.php');
                }

            }
            else
            {
                print '<span class="error">You have to login to view this content</span>';
                include('views/account/login.php');
            }

        }
        else if($controller == "account" and $view == "login")
        {
            if(isset($_POST['btnLogin']))
            {
                if(isset($_SESSION['type']))
                {
                    print '<span class="alert-success">Login was successfull</span>';
                }
                else
                {
                    print '<span class="alert-danger">Invalid Login, Try again</span>';
                    include('views/account/login.php');
                }
            }
            else
            {
                include('views/account/login.php');
            }
        }

        else
        {
            include('views/'.$controller.'/'.$view.".php");
        }
?>