<?php
$cnt = new Country();
$cnt->Id = base64_decode($_GET['id']);

$ename = "";

if(isset($_POST["submit"]))
{
    $cnt = loadUserData($cnt);

    $er = "";

    if($cnt->Name == "")
    {
        $er++;
        $ename = "Required";
    }
    else if(strlen($cnt->Name)<2 || strlen($cnt->Name)>200)
    {
        $er++;
        $ename = "Name must contain 2-200 charecter";
    }

    if($er == 0)
    {
        if($cnt->Update())
        {
            $html->successMessage("Data Updated");
            $cnt = new Country();
        }
        else
        {
            $html->errorMessage($cnt->Error);
        }

    }
    else
    {
        $html->errorMessage("You have some error in your form, Please review.");
    }
}
else
{
    $cnt->SelectById();
}
    $html->formBegin();
    $html->textField("Name", $cnt->Name, $ename);
    $html->submitField();
    $html->formEnd();
?>