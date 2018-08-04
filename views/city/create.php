<?php
$ct = new City();

$ename = "";
$ecountry = "";

if(isset($_POST['submit']))
{
    $ct = loadUserData($ct);

    $er = "";

    if($ct->Name == "")
    {
        $er++;
        $ename = "Required";
    }
    else if(strlen($ct->Name)<2 || strlen($ct->Name)>200)
    {
        $er++;
        $ename = "Name must contain 2-200 charecter";
    }
    if($ct->CountryId == "0")
    {
        $er++;
        $ecountry = "Select one";
    }

    if($er == 0)
    {
        if($ct->Insert())
        {
            $html->successMessage("Data Inserted.");
            $ct = new City();
        }
        else
        {
            $html->errorMessage($ct->Error);
        }

    }
    else
    {
        $html->errorMessage("You have some error in your form, Please review");
    }
}

$html->formBegin();
$html->textField("Name",$ct->Name,$ename);
$cnt = new Country();
$html->selectField("CountryId",$cnt->Select(),$ct->CountryId,$ecountry);
$html->submitField();
$html->formEnd();


?>