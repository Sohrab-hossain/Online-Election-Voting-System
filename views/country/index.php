
<?php
tryFunction();
createLink();
$cnt = new Country();

if(isset($_GET['id']))
{
    $cnt->Id = base64_decode($_GET['id']);
    commonDelete($cnt);
}

$html->table($cnt->Select());

?>