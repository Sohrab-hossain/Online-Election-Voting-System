<?php
$adm = new Admin();
$adm->Id = base64_decode($adm->MS($_GET['id']));

$ename="";
$efather_Name="";
$emother_Name="";
$enid_Number="";
$edate_Of_Birth="";
$egender="";

$edivision="";
$edistrict="";
$esubDistrictd="";

$ework_Institute="";
$ework_Position="";

$eadmin_Image="";
$ephone_Number="";
$eemail="";
$epassword="";
$ere_Password="";

if(isset($_POST['submit']))
{
    $adm = loadUserData($adm);

    $adm->Admin_Image = $_FILES['Admin_Image'];

    $er = "";

    if($adm->Name == "")
    {
        $er++;
        $ename = "Required";
    }
    if($adm->Father_Name == "")
    {
        $er++;
        $efather_Name = "Required";
    }
    if($adm->Mother_Name == "")
    {
        $er++;
        $emother_Name = "Required";
    }
    if($adm->Nid_Number == "")
    {
        $er++;
        $enid_Number = "Required";
    }
    if($adm->Date_Of_Birth == "")
    {
        $er++;
        $edate_Of_Birth = "Required";
    }
    if($adm->Gender == "")
    {
        $er++;
        $egender = "Required";
    }

    if($adm->Permanent_Division_Id == "0")
    {
        $er++;
        $edivision = "Select one";
    }
    if($adm->Permanent_District_Id == "0")
    {
        $er++;
        $edistrict = "Select one";
    }
    if($adm->Permanent_SubDistrict_Id == "0")
    {
        $er++;
        $esubDistrictd = "Select one";
    }

    if($adm->Admin_Image["name"] == "")
    {
        $er++;
        $eadmin_Image = "Required";
    }
    if($adm->Phone_Number == "")
    {
        $er++;
        $ephone_Number = "Required";
    }
    if($adm->Email == "")
    {
        $er++;
        $eemail = "Required";
    }
    if($adm->Work_Institute == "")
    {
        $er++;
        $ework_Institute = "Required";
    }
    if($adm->Work_Position == "")
    {
        $er++;
        $ework_Position = "Required";
    }



    if($adm->Present_Division_Id == "0")
    {
        $er++;
        $edivision = "Select one";
    }
    if($adm->Present_District_Id == "0")
    {
        $er++;
        $edistrict = "Select one";
    }
    if($adm->Present_SubDistrict_Id == "0")
    {
        $er++;
        $esubDistrictd = "Select one";
    }


    if($adm->Password =="")
    {
        $er++;
        $epassword = "Required";
    }
    if($adm->Re_Password =="")
    {
        $er++;
        $ere_Password = "Required";
    }
    if($adm->Password != $adm->Re_Password)
    {
        $er++;
        $epassword = "Password not match";
    }



    if($er == 0)
    {
        if($adm->Update())
        {
            $sp = $adm->Admin_Image['tmp_name'];
            $dp = 'uploads/admin/admin_Images/'.$adm->Id."_".$adm->Admin_Image['name'];
            move_uploaded_file($sp, $dp);



            $html->successMessage("Data Updated.");
            $adm = new Admin();
        }
        else
        {
            $html->errorMessage($adm->Error);
        }

    }
    else
    {
        $html->errorMessage("You have some error in your form, Please review");
    }
}

else
{
    $adm->SelectById();
}

print '<div>';
print '<div class="col-sm-6">';
$html->formBegin("enctype=\"multipart/form-data\"");
$html->textField("Name",$adm->Name,$ename);
$html->textField("Father_Name",$adm->Father_Name,$efather_Name);
$html->textField("Mother_Name",$adm->Mother_Name,$emother_Name);
$html->textField("Nid_Number",$adm->Nid_Number,$enid_Number);
$html->dateField("Date_Of_Birth",$adm->Date_Of_Birth,$edate_Of_Birth);
$html->radioField("Gender",array("Male", "Female", "Other"),$adm->Gender,$egender);

$dvn = new Division();
$html->selectField("Permanent_Division_Id",$dvn->Select(),$adm->Permanent_Division_Id,$edivision);
$dst = new District();
$html->selectField("Permanent_District_Id",$dst->Select(),$adm->Permanent_District_Id,$edistrict);
$sdt = new Sub_District();
$html->selectField("Permanent_SubDistrict_Id",$sdt->Select(),$adm->Permanent_SubDistrict_Id,$esubDistrictd);
$html->textArea("Permanent_Extra_Address",$adm->Permanent_Extra_Address);

print '</div>';

print '<div class="col-sm-6">';
$html->textField("Work_Institute",$adm->Work_Institute,$ework_Institute);
$html->textField("Work_Position",$adm->Work_Position,$ework_Position);

$html->fileField("Admin_Image", $eadmin_Image);
$html->textField("Phone_Number",$adm->Phone_Number,$ephone_Number);
$html->textField("Email",$adm->Email,$eemail);

$dvn = new Division();
$html->selectField("Present_Division_Id",$dvn->Select(),$adm->Present_Division_Id,$edivision);
$dst = new District();
$html->selectField("Present_District_Id",$dst->Select(),$adm->Present_District_Id,$edistrict);
$sdt = new Sub_District();
$html->selectField("Present_SubDistrict_Id",$sdt->Select(),$adm->Present_SubDistrict_Id,$esubDistrictd);
$html->textArea("Present_Extra_Address",$adm->Present_Extra_Address);

$html->passwordField("Password",$adm->Password,$epassword);
$html->passwordField("Re_Password",$adm->Re_Password,$ere_Password);


print '</div>';
print '<div class="col-sm-12" style="text-align: center; margin: 20px; font-size: 30px">';
$html->submitField();
$html->formEnd();
print '</div>';


print '</div>';

?>