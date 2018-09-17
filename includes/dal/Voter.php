<?php

class Voter extends Base
{
    public $Id;
    public $Name;
    public $Father_Name;
    public $Mother_Name;
    public $Nid_Number;
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

    public $Voter_Image;
    public $Phone_Number;
    public $Email;
    public $Password;
    public $Re_Password;
    public $Fingerprint;

    public function Insert()
    {
        $sql = "insert into voter (name,fatherName,motherName,nidNumber,dateOfBirth,gender,presentDivisionId,
            presentDistrictId,presentSubDistrictId,presentExtraAddress,permanentDivisionId,permanentDistrictId,permanentSubDistrictId,
            permanentExtraAddress,voterImage,phoneNumber,email,password,fingerprint,createDate,createIp
            ) values(
                '".$this->MS($this->Name)."',
                '".$this->MS($this->Father_Name)."',
                '".$this->MS($this->Mother_Name)."',
                '".$this->MS($this->Nid_Number)."',
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
                
                '".$this->MS($this->Voter_Image["name"])."',
                '".$this->MS($this->Phone_Number)."',
                '".$this->MS($this->Email)."',
                password('".$this->MS($this->Password)."'),
                '".$this->MS($this->Fingerprint)."',
                
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
        $sql = "update voter set

                name = '".$this->MS($this->Name)."',
                fatherName = '".$this->MS($this->Father_Name)."',
                motherName = '".$this->MS($this->Mother_Name)."',
                nidNumber = '".$this->MS($this->Nid_Number)."',
                dateOfBirth = '".$this->MS($this->Date_Of_Birth)."',
                gender = '".$this->MS($this->Gender)."',
                
                presentDivisionId = ".$this->MS($this->Present_Division_Id).",
                presentDistrictId = ".$this->MS($this->Present_District_Id).",
                presentSubDistrictId = ".$this->MS($this->Present_SubDistrict_Id).",
                presentExtraAddress = '".$this->MS($this->Present_Extra_Address)."',
                
                permanentDivisionId = ".$this->MS($this->Permanent_Division_Id).",
                permanentDistrictId = ".$this->MS($this->Permanent_District_Id).",
                permanentSubDistrictId	= ".$this->MS($this->Permanent_SubDistrict_Id).",
                permanentExtraAddress = '".$this->MS($this->Permanent_Extra_Address)."',
                
                voterImage = '".$this->MS($this->Voter_Image["name"])."',
                phoneNumber = '".$this->MS($this->Phone_Number)."',
               email = '".$this->MS($this->Email)."',
                password = '".$this->MS($this->Password)."',
                fingerprint = '".$this->MS($this->Fingerprint)."'                
        
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
        $sql = "delete from voter where id = ".$this->MS($this->Id);
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
        $sql = "select vtr.id,vtr.name,vtr.fatherName,vtr.motherName,vtr.nidNumber,vtr.dateOfBirth,vtr.gender,
                dvn.name as present_division,dst.name as present_district,sdt.name as present_SubDistrict,
                vtr.presentExtraAddress,dvn.name as permanent_division,dst.name as permanent_district,
                sdt.name as permanent_SubDistrict,vtr.permanentExtraAddress,vtr.voterImage,vtr.phoneNumber,vtr.email,
                vtr.createDate,vtr.createIp from voter as vtr
                
                left join division as dvn on vtr.presentDivisionId=dvn.id
                and vtr.permanentDivisionId=dvn.id      
                
                left join district as dst on vtr.presentDistrictId=dst.id
                and vtr.permanentDistrictId=dst.id       
                
                left join subdistrict as sdt on vtr.presentSubDistrictId=sdt.id
                and vtr.permanentSubDistrictId=sdt.id";

        $table = mysqli_query($this->CN,$sql);
        print '<table class="table table-striped">';
        print '<tr><th>ID</th><th>Voter</th><th>Basic Info</th><th>Other Info</th></th><th>Present Address</th><th>Permanent Address</th><th>Security Info</th><th>Edit</th></tr>';
        while($row = mysqli_fetch_assoc($table))
        {
            print '<tr>';

            print '<td class="ID">'.htmlentities($row["id"]).'</td>';

            print '<td class="voter">'.
                '<img src="uploads/voter/voter_images/'.$row["id"].'_'.$row["voterImage"].'"/><br/>'.
                htmlentities($row["name"])
                .'</td>';

            print '<td class="basic info">'.
                "NID Number: ".htmlentities($row["nidNumber"])."<br/>".
                "Date Of Birth: ".htmlentities($row["dateOfBirth"])."<br/>".
                "Father Name: ".htmlentities($row["fatherName"])."<br/>".
                "Mother Name: ".htmlentities($row["motherName"])
                .'</td>';

            print '<td class="other info">'.
                "Phone Number: ".htmlentities($row["phoneNumber"])."<br/>".
                "Email: ".htmlentities($row["email"])."<br/>".
                "Gender: ".htmlentities($row["gender"])
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
        $sql = "select id, name,fatherName,motherName,nidNumber,dateOfBirth,gender,presentDivisionId,presentDistrictId,
              presentSubDistrictId,presentExtraAddress,permanentDivisionId,permanentDistrictId,permanentSubDistrictId,
            permanentExtraAddress,voterImage,phoneNumber,email
             from voter where id = ".$this->MS($this->Id);
        $table = (mysqli_query($this->CN,$sql));
        while($row = mysqli_fetch_assoc($table))
        {
            $this->Name = $row["name"];
            $this->Father_Name = $row["fatherName"];
            $this->Mother_Name = $row["motherName"];
            $this->Nid_Number = $row["nidNumber"];
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

            $this->Voter_Image = $row["voterImage"];
            $this->Phone_Number = $row["phoneNumber"];
            $this->Email = $row["email"];

            return true;
        }
        $this->Error = mysqli_error($this->CN);
        return false;
    }

}

?>