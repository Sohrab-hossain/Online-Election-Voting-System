<?php
$dst = new District();

$ename = "";
$edivision = "";

if(isset($_POST['submit']))
{
    $dst = loadUserData($dst);

    $er = "";

    if($dst->Name == "")
    {
        $er++;
        $ename = "Required";
    }
    else if(strlen($dst->Name)<2 || strlen($dst->Name)>200)
    {
        $er++;
        $ename = "Name must contain 2-200 charecter";
    }
    if($dst->DivisionId == "0")
    {
        $er++;
        $edivision = "Select one";
    }

    if($er == 0)
    {
        if($dst->Insert())
        {
            $html->successMessage("Data Inserted.");
            $dst = new District();
        }
        else
        {
            $html->errorMessage($dst->Error);
        }

    }
    else
    {
        $html->errorMessage("You have some error in your form, Please review");
    }
}

$html->formBegin();
$html->textField("Name",$dst->Name,$ename);
$dvn = new Division();
$html->selectField("DivisionId",$dvn->Select(),$dst->DivisionId,$edivision);
$html->submitField();
$html->formEnd();


?>