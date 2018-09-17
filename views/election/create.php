<?php
$elc = new Election();

$edistrict = "";
$estartTime = "";
$eendTime = "";
$ecandidate_Id_1 = "";
$ecandidate_Id_2 = "";
$ecandidate_Id_3 = "";


if(isset($_POST['submit']))
{
    $elc = loadUserData($elc);

    $er = "";

    if($elc->District_Id == "0")
    {
        $er++;
        $$edistrict = "Select One";
    }
    if($elc->StartTime == "")
    {
        $er++;
        $estartTime = "Required";
    }
    if($elc->EndTime == "")
    {
        $er++;
        $eendTime = "Required";
    }

    if($elc->Candidate_Id_1 == "0")
    {
        $er++;
        $$ecandidate_Id_1 = "Select One";
    }
    if($elc->Candidate_Id_2 == "0")
    {
        $er++;
        $$ecandidate_Id_2 = "Select One";
    }
    if($elc->Candidate_Id_3 == "0")
    {
        $er++;
        $$ecandidate_Id_3 = "Select One";
    }






    if($er == 0)
    {
        if($elc->Insert())
        {



            $html->successMessage("Data Inserted.");
            $elc = new Election();
        }
        else
        {
            $html->errorMessage($elc->Error);
        }

    }
    else
    {
        $html->errorMessage("You have some error in your form, Please review");
    }
}







print '<div>';
    print '<div class="col-sm-4">';
        $html->formBegin();
        $dst = new District();
        $html->selectField("District_Id",$dst->Select(),$elc->District_Id,$edistrict);
    print '</div>';
    print '<div class="col-sm-4">';
        $html->timeField("StartTime",$elc->StartTime,$estartTime);
    print '</div>';
    print '<div class="col-sm-4">';
        $html->timeField("EndTime",$elc->EndTime,$eendTime);
    print '</div>';
print '</div>';
print '<hr /><hr /><br><br><br><br>';

print '<div>';
    print '<div class="col-sm-4">';
        $cnd = new Candidate();
        $html->selectField("Candidate_Id_1",$cnd->SelectName(),$elc->Candidate_Id_1,$ecandidate_Id_1);
        $cnd = new Candidate();
        $html->selectField("Candidate_Id_4",$cnd->SelectName(),$elc->Candidate_Id_4);
    print '</div>';

    print '<div class="col-sm-4">';
        $cnd = new Candidate();
        $html->selectField("Candidate_Id_2",$cnd->SelectName(),$elc->Candidate_Id_2,$ecandidate_Id_2);
        $cnd = new Candidate();
        $html->selectField("Candidate_Id_5",$cnd->SelectName(),$elc->Candidate_Id_5);
    print '</div>';

    print '<div class="col-sm-4">';
        $cnd = new Candidate();
        $html->selectField("Candidate_Id_3",$cnd->SelectName(),$elc->Candidate_Id_3,$ecandidate_Id_3);
        $html->submitField();
        $html->formEnd();
    print '</div>';
print '</div>';


















?>