<?php
createLink();
$dst = new District();


if(isset($_GET['id']))
{
    $dst->Id = base64_decode($_GET['id']);
    commonDelete($dst);
}

$html->table($dst->Select());

?>