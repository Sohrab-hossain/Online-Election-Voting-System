<?php
createLink();

$dvn = new Division();
if(isset($_GET['id']))
{
    $dvn->Id = base64_decode($_GET['id']);
    commonDelete($dvn);
}
$html->table($dvn->Select());
?>
