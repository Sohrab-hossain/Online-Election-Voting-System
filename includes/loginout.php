<?php
$email = "";
$nidNumber = "";
$password = "";

$eemail = "";
$enidNumber = "";
$epassword = "";

if(isset($_POST['btnLogin']))
{
    $adm = new Admin();
    $adm->Email = $_POST['email'];
    $adm->Nid_Number = $_POST['nidNumber'];
    $adm->Password = $_POST['password'];

    if($adm->Login())
    {
        $_SESSION['id'] = $adm->Id;
        $_SESSION['name'] = $adm->Name;
        $_SESSION['nidNumber'] = $adm->Nid_Number;
        $_SESSION['email'] = $adm->Email;
        $_SESSION['type'] = $adm->Type;
    }
}

if($view == "logout")
{
    unset($_SESSION['id']);
    unset($_SESSION['name']);
    unset($_SESSION['nidNumber']);
    unset($_SESSION['email']);
    unset($_SESSION['type']);
}

?>