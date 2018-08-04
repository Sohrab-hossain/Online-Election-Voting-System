<?php
$dvn = new Division();
$dvn->Id = base64_decode($_GET['id']);

$ename = "";

if(isset($_POST["submit"]))
{
    $dvn = loadUserData($dvn);

    $er = "";

    if($dvn->Name == "")
    {
        $er++;
        $ename = "Required";
    }
    else if(strlen($dvn->Name)<2 || strlen($dvn->Name)>200)
    {
        $er++;
        $ename = "Name must contain 2-200 charecter";
    }

    if($er == 0)
    {
        if($dvn->Update())
        {
            $html->successMessage("Data Updated");
            $dvn = new Division();
        }
        else
        {
            $html->errorMessage($dvn->Error);
        }

    }
    else
    {
        $html->errorMessage("You have some error in your form, Please review.");
    }
}
else
{
    $dvn->SelectById();
}
$html->formBegin();
$html->textField("Name", $dvn->Name, $ename);
$html->submitField();
$html->formEnd();
?>