<?php
createLink();
$cnd = new Candidate();

if(isset($_GET['id']))
{
    $cnd->Id = base64_decode($_GET['id']);
    commonDelete($cnd);
}

$cnd->Select();

?>