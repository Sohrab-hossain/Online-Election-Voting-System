<?php
createLink();
$vtr = new Voter();

if(isset($_GET['id']))
{
    $vtr->Id = base64_decode($_GET['id']);
    commonDelete($vtr);
}

$vtr->Select();

?>