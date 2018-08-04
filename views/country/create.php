<?php
$cnt = new Country();
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
        if($cnt->Insert())
        {
            $html->successMessage("Data Inserted");
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

$html->formBegin();
$html->textField("Name", $cnt->Name, $ename);
$html->submitField();
$html->formEnd();
?>