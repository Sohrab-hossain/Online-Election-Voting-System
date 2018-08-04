<?php
createLink();
$ct = new City();


if(isset($_GET['id']))
{
    $ct->Id = base64_decode($_GET['id']);
    commonDelete($ct);
}

$html->table($ct->Select());

?>