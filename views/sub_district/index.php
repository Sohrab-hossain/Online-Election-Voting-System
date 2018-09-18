<?php
createLink();
$sdt = new Sub_District();

if(isset($_GET['id']))
{
    $sdt->Id = base64_decode($_GET['id']);
    commonDelete($sdt);
}

$html->table($sdt->Select());

?>