<?php

class Candidate extends Base
{
    public $Id;
    public $Name;
    public $Father_Name;
    public $Mother_Name;
    public $Nid_Number;
    public $Nid_Copy;
    public $Date_Of_Birth;
    public $Gender;

    public $Present_Division_Id;
    public $Present_District_Id;
    public $Present_SubDistrict_Id;
    public $Present_Extra_Address;

    public $Permanent_Division_Id;
    public $Permanent_District_Id;
    public $Permanent_SubDistrict_Id;
    public $Permanent_Extra_Address;

    public $Candidate_Image;
    public $Phone_Number;
    public $Email;
    public $Candidate_Party_Symbol;
    public $Candidate_Details_Pdf;


    public function Insert()
    {
        $sql = "insert into candidate (name,fatherName,motherName,nidNumber,nidCopy,dateOfBirth,gender,presentDivisionId,presentDistrictId,
presentSubDistrictId,presentExtraAddress,permanentDivisionId,permanentDistrictId,permanentSubDistrictId,permanentExtraAddress,canImage,
phoneNumber,email,canPartySymbol,canDetailsPdf,createDate,createIp
) values(
                '".$this->MS($this->Name)."',
                '".$this->MS($this->Father_Name)."',
                '".$this->MS($this->Mother_Name)."',
                '".$this->MS($this->Nid_Number)."',
                '".$this->MS($this->Nid_Copy["name"])."',
                '".$this->MS($this->Date_Of_Birth)."',
                '".$this->MS($this->Gender)."',
                
                ".$this->MS($this->Present_Division_Id).",
                ".$this->MS($this->Present_District_Id).",
                ".$this->MS($this->Present_SubDistrict_Id).",
                '".$this->MS($this->Present_Extra_Address)."',
                
                ".$this->MS($this->Permanent_Division_Id).",
                ".$this->MS($this->Permanent_District_Id).",
                ".$this->MS($this->Permanent_SubDistrict_Id).",
                '".$this->MS($this->Permanent_Extra_Address)."',
                
                '".$this->MS($this->Candidate_Image["name"])."',
                '".$this->MS($this->Phone_Number)."',
                '".$this->MS($this->Email)."',
                '".$this->MS($this->Candidate_Party_Symbol["name"])."',
                '".$this->MS($this->Candidate_Details_Pdf["name"])."',
                
                '".date("Y-m-d")."',
                '".$_SERVER['REMOTE_ADDR']."'		

                )";

        if(mysqli_query($this->CN,$sql))
        {
            $this->Id = mysqli_insert_id($this->CN);
            return true;
        }
        else
        {
            $this->Error = mysqli_error($this->CN);
            return false;
        }
    }

    public function Update()
    {
        $sql = "update candidate set

                name = '".$this->MS($this->Name)."',
                fatherName = '".$this->MS($this->Father_Name)."',
                motherName = '".$this->MS($this->Mother_Name)."',
                nidNumber = '".$this->MS($this->Nid_Number)."',
                nidCopy =  '".$this->MS($this->Nid_Copy["name"])."',
                dateOfBirth = '".$this->MS($this->Date_Of_Birth)."',
                gender =  '".$this->MS($this->Gender)."',
                
                presentDivisionId = ".$this->MS($this->Present_Division_Id).",
                presentDistrictId = ".$this->MS($this->Present_District_Id).",
                presentSubDistrictId =  ".$this->MS($this->Present_SubDistrict_Id).",
                presentExtraAddress = '".$this->MS($this->Present_Extra_Address)."',
                
                permanentDivisionId = ".$this->MS($this->Permanent_Division_Id).",
                permanentDistrictId =  ".$this->MS($this->Permanent_District_Id).",
                permanentSubDistrictId =  ".$this->MS($this->Permanent_SubDistrict_Id).",
                permanentExtraAddress = '".$this->MS($this->Permanent_Extra_Address)."',
                
                canImage = '".$this->MS($this->Candidate_Image["name"])."',
                phoneNumber =  '".$this->MS($this->Phone_Number)."',
                email = '".$this->MS($this->Email)."',
                canPartySymbol = '".$this->MS($this->Candidate_Party_Symbol["name"])."',
                canDetailsPdf =  '".$this->MS($this->Candidate_Details_Pdf["name"])."' 
        
         where id = ".$this->MS($this->Id);
        if(mysqli_query($this->CN,$sql))
        {
            return true;
        }
        else
        {
            $this->Error = mysqli_error($this->CN);
            return false;
        }
    }

    public function Delete()
    {
        $sql = "delete from candidate where id = ".$this->MS($this->Id);
        if(mysqli_query($this->CN,$sql))
        {
            return true;
        }
        else
        {
            $this->Error = mysqli_error($this->CN);
            return false;
        }
    }

    public function Select()
    {
        $sql = "select cnd.id,cnd.name,cnd.fatherName,cnd.motherName,cnd.nidNumber,cnd.nidCopy,cnd.dateOfBirth,cnd.gender,
                dvn.name as present_division,dst.name as present_district,sdt.name as present_SubDistrict,
                cnd.presentExtraAddress,dvn.name as permanent_division,dst.name as permanent_district,
                sdt.name as permanent_SubDistrict,cnd.permanentExtraAddress,cnd.canImage,cnd.phoneNumber,cnd.email,
                cnd.canPartySymbol,cnd.canDetailsPdf,cnd.createDate,cnd.createIp from candidate as cnd
                left join division as dvn on cnd.presentDivisionId=dvn.id
                and cnd.permanentDivisionId=dvn.id      
                
                left join district as dst on cnd.presentDistrictId=dst.id
                and cnd.permanentDistrictId=dst.id       
                
                left join subdistrict as sdt on cnd.presentSubDistrictId=sdt.id
                and cnd.permanentSubDistrictId=sdt.id";

        $table = mysqli_query($this->CN,$sql);
        print '<table class="table table-striped">';
        print '<tr><th>Basic Info</th><th>Other Info</th><th>Candidate</th></th><th>Present Address</th><th>Permanent Address</th><th>Security Info</th><th>Edit | Delete</th></tr>';
        while($row = mysqli_fetch_assoc($table))
        {
            print '<tr>';
            print '<td class="basic_info">'.
                "Id: ".htmlentities($row["id"])."<br/>".
                "Name: ".htmlentities($row["name"])."<br/>".
                "Father Name: ".htmlentities($row["fatherName"])."<br/>".
                "Mother Name: ".htmlentities($row["motherName"])."<br/>".
                "Phone Number: ".htmlentities($row["phoneNumber"])."<br/>".
                "Email: ".htmlentities($row["email"])
                .'</td>';

            print '<td class="other_info">'.
                '<img src="uploads/candidate/candidate_Images/'.$row["id"].'_'.$row["canImage"].'"/><br/>'.
                "NID Number: ".htmlentities($row["nidNumber"])."<br/>".
                "Date Of Birth: ".htmlentities($row["dateOfBirth"])."<br/>".
                "Gender: ".htmlentities($row["gender"])
                .'</td>';

            print '<td class="candidate_info">'.
                'Symbol:<img src="uploads/candidate/candidate_Images/'.$row["id"].'_'.$row["canPartySymbol"].'"/><br/>'.
                "NID Copy: ".'<a href=\"uploads/candidate/candidate_Nid/\'.$row["id"].\'.\'_\'.$row["nidCopy"]\">Download</a><br/>';
                "Candidate Details Pdf: ".htmlentities($row["canDetailsPdf"])

                .'</td>';




            print '<td class="pre_address_info">'.
                "Division : ".htmlentities($row["present_division"])."<br/>".
                "District: ".htmlentities($row["present_district"])."<br/>".
                "SubDistrict: ".htmlentities($row["present_SubDistrict"])."<br/>".
                "Extra Address: ".htmlentities($row["presentExtraAddress"])
                .'</td>';
            print '<td class="per_address_info">'.
                "Division : ".htmlentities($row["permanent_division"])."<br/>".
                "District: ".htmlentities($row["permanent_district"])."<br/>".
                "SubDistrict: ".htmlentities($row["permanent_SubDistrict"])."<br/>".
                "Extra Address: ".htmlentities($row["permanentExtraAddress"])
                .'</td>';

            print '<td cladd="security_info">'.
                "IP Address: ".htmlentities($row["createIp"])."<br/>".
                "Date: ".htmlentities($row["createDate"])
                .'</td>';

            print '<td>'.editDeleteLink($row["id"]).'</td>';

            print '</tr>';
        }
        print '</table>';


    }

    public function SelectById()
    {
        $sql = "select id, name,fatherName,motherName,nidNumber,nidCopy,dateOfBirth,gender,presentDivisionId,presentDistrictId,
presentSubDistrictId,presentExtraAddress,permanentDivisionId,permanentDistrictId,permanentSubDistrictId,permanentExtraAddress,canImage,
phoneNumber,email,canPartySymbol,canDetailsPdf from candidate where id = ".$this->MS($this->Id);
        $table = (mysqli_query($this->CN,$sql));
        while($row = mysqli_fetch_assoc($table))
        {
            $this->Name = $row["name"];
            $this->Father_Name = $row["fatherName"];
            $this->Mother_Name = $row["motherName"];
            $this->Nid_Number = $row["nidNumber"];
            $this->Nid_Copy = $row["nidCopy"];
            $this->Date_Of_Birth = $row["dateOfBirth"];
            $this->Gender = $row["gender"];

            $this->Present_Division_Id = $row["presentDivisionId"];
            $this->Present_District_Id = $row["presentDistrictId"];
            $this->Present_SubDistrict_Id = $row["presentSubDistrictId"];
            $this->Present_Extra_Address = $row["presentExtraAddress"];

            $this->Permanent_Division_Id = $row["permanentDivisionId"];
            $this->Permanent_District_Id = $row["permanentDistrictId"];
            $this->Permanent_SubDistrict_Id = $row["permanentSubDistrictId"];
            $this->Permanent_Extra_Address = $row["permanentExtraAddress"];

            $this->Candidate_Image = $row["canImage"];
            $this->Phone_Number = $row["phoneNumber"];
            $this->Email = $row["email"];
            $this->Candidate_Party_Symbol = $row["canPartySymbol"];
            $this->Candidate_Details_Pdf = $row["canDetailsPdf"];

            return true;
        }
        $this->Error = mysqli_error($this->CN);
        return false;
    }
    public function SelectName()
    {
        $a = array();
        $sql = "select id, name from candidate";
        $table = mysqli_query($this->CN,$sql);
        while($row = mysqli_fetch_assoc($table))
        {
            $a[]= $row;
        }
        return $a;
    }

}
?>