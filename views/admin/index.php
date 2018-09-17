<?php
createLink();
$adm = new Admin();

if(isset($_GET['id']))
{
    $adm->Id = base64_decode($_GET['id']);
    commonDelete($adm);
}



?>