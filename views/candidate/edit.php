<?php
$cnd = new Candidate();

$cnd->Id = base64_decode($cnd->MS($_GET['id']));

$ename="";
$efather_Name="";
$emother_Name="";
$enid_Number="";
$enid_Copy="";
$edate_Of_Birth="";
$egender="";

$edivision="";
$edistrict="";
$esubDistrictd="";

$ecandidate_Image="";
$ephone_Number="";
$eemail="";
$ecandidate_Party_Symbol="";
$ecandidate_Details_Pdf="";

if(isset($_POST['submit']))
{
    $cnd = loadUserData($cnd);

    $cnd->Nid_Copy = $_FILES['Nid_Copy'];
    $cnd->Candidate_Image = $_FILES['Candidate_Image'];
    $cnd->Candidate_Party_Symbol = $_FILES['Candidate_Party_Symbol'];
    $cnd->Candidate_Details_Pdf = $_FILES['Candidate_Details_Pdf'];

    $er = "";

    if($cnd->Name == "")
    {
        $er++;
        $ename = "Required";
    }
    if($cnd->Father_Name == "")
    {
        $er++;
        $efather_Name = "Required";
    }
    if($cnd->Mother_Name == "")
    {
        $er++;
        $emother_Name = "Required";
    }
    if($cnd->Nid_Number == "")
    {
        $er++;
        $enid_Number = "Required";
    }
    if($cnd->Nid_Copy["name"] == "")
    {
        $er++;
        $enid_Copy = "Required";
    }
    if($cnd->Date_Of_Birth == "")
    {
        $er++;
        $edate_Of_Birth = "Required";
    }
    if($cnd->Gender == "")
    {
        $er++;
        $egender = "Required";
    }

    if($cnd->Permanent_Division_Id == "0")
    {
        $er++;
        $edivision = "Select one";
    }
    if($cnd->Permanent_District_Id == "0")
    {
        $er++;
        $edistrict = "Select one";
    }
    if($cnd->Permanent_SubDistrict_Id == "0")
    {
        $er++;
        $esubDistrictd = "Select one";
    }

    if($cnd->Candidate_Image["name"] == "")
    {
        $er++;
        $ecandidate_Image = "Required";
    }
    if($cnd->Phone_Number == "")
    {
        $er++;
        $ephone_Number = "Required";
    }
    if($cnd->Email == "")
    {
        $er++;
        $eemail = "Required";
    }

    if($cnd->Present_Division_Id == "0")
    {
        $er++;
        $edivision = "Select one";
    }
    if($cnd->Present_District_Id == "0")
    {
        $er++;
        $edistrict = "Select one";
    }
    if($cnd->Present_SubDistrict_Id == "0")
    {
        $er++;
        $esubDistrictd = "Select one";
    }

    if($cnd->Candidate_Party_Symbol["name"] == "")
    {
        $er++;
        $ecandidate_Party_Symbol = "Required";
    }
    if($cnd->Candidate_Details_Pdf["name"] == "")
    {
        $er++;
        $ecandidate_Details_Pdf = "Required";
    }





    if($er == 0)
    {
        if($cnd->Update())
        {
            $sp = $cnd->Nid_Copy['tmp_name'];
            $dp = 'uploads/candidate/candidate_Nid/'.$cnd->Id."_".$cnd->Nid_Copy['name'];
            move_uploaded_file($sp, $dp);

            $sp = $cnd->Candidate_Image['tmp_name'];
            $dp = 'uploads/candidate/candidate_Images/'.$cnd->Id."_".$cnd->Candidate_Image['name'];
            move_uploaded_file($sp, $dp);

            $sp = $cnd->Candidate_Party_Symbol['tmp_name'];
            $dp = 'uploads/candidate/candidate_Party_Symbols/'.$cnd->Id."_".$cnd->Candidate_Party_Symbol['name'];
            move_uploaded_file($sp, $dp);

            $sp = $cnd->Candidate_Details_Pdf['tmp_name'];
            $dp = 'uploads/candidate/candidate_Details_Pdf/'.$cnd->Id."_".$cnd->Candidate_Details_Pdf['name'];
            move_uploaded_file($sp, $dp);



            $html->successMessage("Data Updated.");
            $cnd = new Candidate();
        }
        else
        {
            $html->errorMessage($cnd->Error);
        }

    }
    else
    {
        $html->errorMessage("You have some error in your form, Please review");
    }
}
else
{
    $cnd->SelectById();
}

print '<div>';
print '<div class="col-sm-6">';
$html->formBegin("enctype=\"multipart/form-data\"");
$html->textField("Name",$cnd->Name,$ename);
$html->textField("Father_Name",$cnd->Father_Name,$efather_Name);
$html->textField("Mother_Name",$cnd->Mother_Name,$emother_Name);
$html->textField("Nid_Number",$cnd->Nid_Number,$enid_Number);
$html->fileField("Nid_Copy", $enid_Copy);
$html->dateField("Date_Of_Birth",$cnd->Date_Of_Birth,$edate_Of_Birth);
$html->radioField("Gender",array("Male", "Female", "Other"),$cnd->Gender,$egender);
$dvn = new Division();
$html->selectField("Permanent_Division_Id",$dvn->Select(),$cnd->Permanent_Division_Id,$edivision);
$dst = new District();
$html->selectField("Permanent_District_Id",$dst->Select(),$cnd->Permanent_District_Id,$edistrict);
$sdt = new Sub_District();
$html->selectField("Permanent_SubDistrict_Id",$sdt->Select(),$cnd->Permanent_SubDistrict_Id,$esubDistrictd);
$html->textArea("Permanent_Extra_Address",$cnd->Permanent_Extra_Address);

print '</div>';

print '<div class="col-sm-6">';
$html->fileField("Candidate_Image", $ecandidate_Image);
$html->textField("Phone_Number",$cnd->Phone_Number,$ephone_Number);
$html->textField("Email",$cnd->Email,$eemail);

$dvn = new Division();
$html->selectField("Present_Division_Id",$dvn->Select(),$cnd->Present_Division_Id,$edivision);
$dst = new District();
$html->selectField("Present_District_Id",$dst->Select(),$cnd->Present_District_Id,$edistrict);
$sdt = new Sub_District();
$html->selectField("Present_SubDistrict_Id",$sdt->Select(),$cnd->Present_SubDistrict_Id,$esubDistrictd);
$html->textArea("Present_Extra_Address",$cnd->Present_Extra_Address);

$html->fileField("Candidate_Party_Symbol", $ecandidate_Party_Symbol);
$html->fileField("Candidate_Details_Pdf", $ecandidate_Details_Pdf);

$html->submitField();
$html->formEnd();
print '</div>';


print '</div>';

?>