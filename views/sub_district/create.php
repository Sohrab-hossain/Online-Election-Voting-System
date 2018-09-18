<?php
$sdt = new Sub_District();

$ename = "";
$edivision = "";
$edistrict = "";

if(isset($_POST['submit']))
{
    $sdt = loadUserData($sdt);

    $er = "";

    if($sdt->Name == "")
    {
        $er++;
        $ename = "Required";
    }
    else if(strlen($sdt->Name)<2 || strlen($sdt->Name)>200)
    {
        $er++;
        $ename = "Name must contain 2-200 charecter";
    }
    if($sdt->DivisionId == "0")
    {
        $er++;
        $edivision = "Select one";
    }
    if($sdt->DistrictId == "0")
    {
        $er++;
        $edistrict = "Select one";
    }

    if($er == 0)
    {
        if($sdt->Insert())
        {
            $html->successMessage("Data Inserted.");
            $sdt = new Sub_District();
        }
        else
        {
            $html->errorMessage($sdt->Error);
        }

    }
    else
    {
        $html->errorMessage("You have some error in your form, Please review");
    }
}

$html->formBegin();
$html->textField("Name",$sdt->Name,$ename);

$dvn = new Division();
$html->selectField("DivisionId",$dvn->Select(),$sdt->DivisionId,$edivision);

$dst = new District();
$html->selectField("DistrictId",$dst->Select(),$sdt->DistrictId,$edistrict);

$html->submitField();
$html->formEnd();

?>