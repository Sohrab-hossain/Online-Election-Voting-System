<?php
$vtr = new Voter();

$vtr->Id = base64_decode($vtr->MS($_GET['id']));

$ename="";
$efather_Name="";
$emother_Name="";
$enid_Number="";
$edate_Of_Birth="";
$egender="";

$edivision="";
$edistrict="";
$esubDistrictd="";

$evoter_Image="";
$ephone_Number="";
$eemail="";
$epassword="";
$ere_Password="";

if(isset($_POST['submit']))
{
    $vtr = loadUserData($vtr);

    $vtr->Voter_Image = $_FILES['Voter_Image'];

    $er = "";

    if($vtr->Name == "")
    {
        $er++;
        $ename = "Required";
    }
    if($vtr->Father_Name == "")
    {
        $er++;
        $efather_Name = "Required";
    }
    if($vtr->Mother_Name == "")
    {
        $er++;
        $emother_Name = "Required";
    }
    if($vtr->Nid_Number == "")
    {
        $er++;
        $enid_Number = "Required";
    }

    if($vtr->Date_Of_Birth == "")
    {
        $er++;
        $edate_Of_Birth = "Required";
    }
    if($vtr->Gender == "")
    {
        $er++;
        $egender = "Required";
    }

    if($vtr->Permanent_Division_Id == "0")
    {
        $er++;
        $edivision = "Select one";
    }
    if($vtr->Permanent_District_Id == "0")
    {
        $er++;
        $edistrict = "Select one";
    }
    if($vtr->Permanent_SubDistrict_Id == "0")
    {
        $er++;
        $esubDistrictd = "Select one";
    }
    if($vtr->Voter_Image["name"] == "")
    {
        $er++;
        $evoter_Image = "Required";
    }

    if($vtr->Phone_Number == "")
    {
        $er++;
        $ephone_Number = "Required";
    }
    if($vtr->Email == "")
    {
        $er++;
        $eemail = "Required";
    }

    if($vtr->Present_Division_Id == "0")
    {
        $er++;
        $edivision = "Select one";
    }
    if($vtr->Present_District_Id == "0")
    {
        $er++;
        $edistrict = "Select one";
    }
    if($vtr->Present_SubDistrict_Id == "0")
    {
        $er++;
        $esubDistrictd = "Select one";
    }
    if($vtr->Password =="")
    {
        $er++;
        $epassword = "Required";
    }
    if($vtr->Re_Password =="")
    {
        $er++;
        $ere_Password = "Required";
    }
    if($vtr->Password != $vtr->Re_Password)
    {
        $er++;
        $epassword = "Password not match";
    }





    if($er == 0)
    {
        if($vtr->Update())
        {
            $sp = $vtr->Voter_Image['tmp_name'];
            $dp = 'uploads/voter/voter_Images/'.$vtr->Id."_".$vtr->Voter_Image['name'];
            move_uploaded_file($sp, $dp);


            $html->successMessage("Data Updated.");
            $vtr = new Voter();
        }
        else
        {
            $html->errorMessage($vtr->Error);
        }

    }
    else
    {
        $html->errorMessage("You have some error in your form, Please review");
    }
}
else
{
    $vtr->SelectById();
}

print '<div>';
    print '<div class="col-sm-6">';
        $html->formBegin("enctype=\"multipart/form-data\"");
        $html->textField("Name",$vtr->Name,$ename);
        $html->textField("Father_Name",$vtr->Father_Name,$efather_Name);
        $html->textField("Mother_Name",$vtr->Mother_Name,$emother_Name);
        $html->textField("Nid_Number",$vtr->Nid_Number,$enid_Number);
        $html->dateField("Date_Of_Birth",$vtr->Date_Of_Birth,$edate_Of_Birth);
        $html->radioField("Gender",array("Male", "Female", "Other"),$vtr->Gender,$egender);

        $dvn = new Division();
        $html->selectField("Permanent_Division_Id",$dvn->Select(),$vtr->Permanent_Division_Id,$edivision);
        $dst = new District();
        $html->selectField("Permanent_District_Id",$dst->Select(),$vtr->Permanent_District_Id,$edistrict);
        $sdt = new Sub_District();
        $html->selectField("Permanent_SubDistrict_Id",$sdt->Select(),$vtr->Permanent_SubDistrict_Id,$esubDistrictd);
        $html->textArea("Permanent_Extra_Address",$vtr->Permanent_Extra_Address);
    print '</div>';

    print '<div class="col-sm-6">';
        $html->fileField("Voter_Image", $evoter_Image);
        $html->textField("Phone_Number",$vtr->Phone_Number,$ephone_Number);
        $html->textField("Email",$vtr->Email,$eemail);

        $dvn = new Division();
        $html->selectField("Present_Division_Id",$dvn->Select(),$vtr->Present_Division_Id,$edivision);
        $dst = new District();
        $html->selectField("Present_District_Id",$dst->Select(),$vtr->Present_District_Id,$edistrict);
        $sdt = new Sub_District();
        $html->selectField("Present_SubDistrict_Id",$sdt->Select(),$vtr->Present_SubDistrict_Id,$esubDistrictd);
        $html->textArea("Present_Extra_Address",$vtr->Present_Extra_Address);

        $html->passwordField("Password",$vtr->Password,$epassword);
        $html->passwordField("Re_Password",$vtr->Re_Password,$ere_Password);

        $html->submitField();
        $html->formEnd();
    print '</div>';


print '</div>';
?>