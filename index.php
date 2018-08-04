<?php
session_start();
include('includes/library.php');
$html = new HTML();
$title = "Online Election and Voting";
$controller = "home";
$view= "index";

if(isset($_GET['controller']))
{
    $controller = $_GET['controller'];
}
if(isset($_GET['view']))
{
    $view= $_GET['view'];
}
function tryFunction()
{
    print "Hi, I am Zafran";
}
function createLink()
{
    global $controller;
    print"<a href=\"?controller=$controller&view=create\">New ".ucwords($controller)."</a>";
}

function editDeleteLink($id)
{
    global $controller;
    $s = '<a href="?controller='.$controller.'&view=edit&id='.base64_encode($id).'"><i class="fas fa-user-edit"></i></a>';
    $s .= ' | <a href="?controller='.$controller.'&view=index&id='.base64_encode($id).'"><i class="fas fa-trash"></i></a>';

    return $s;
}
function commonDelete($obj)
{
    if($obj->Delete())
    {
        print '<span class = "alert-success">Data Deleted</span>';
    }
    else{
        print '<span class = "alert-danger">'.$obj->Error.'</span>';
    }
}
function loadUserData($obj)
{
    foreach ($_POST as $k=>$v)
    {
        $obj->$k = $v;
        //$cnt->Name = $_POST["name"];
    }
    return $obj;
}
include('includes/clientScript.php');
require('views/shared/adminLayout.php');
?>