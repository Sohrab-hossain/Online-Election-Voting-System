<?php
/**
 * Created by PhpStorm.
 * User: S.H.Zafran
 * Date: 04-Aug-18
 * Time: 7:40 PM
 */

class Sub_District extends Base
{
    public $Id;
    public $Name;
    public $DivisionId;
    public $DistrictId;

    public function Insert()
    {
        $sql = "insert into subdistrict (name,divisionId,districtId) values(
                '".$this->MS($this->Name)."',
                ".$this->MS($this->DivisionId).",
                ".$this->MS($this->DistrictId)."
                )";
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

    public function Update()
    {
        $sql = "update subdistrict set name = '".$this->MS($this->Name)."', 
        divisionId= ".$this->MS($this->DivisionId).",
        districtId= ".$this->MS($this->DistrictId)."
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
        $sql = "delete from subdistrict where id = ".$this->MS($this->Id);
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
        $a = array();
        $sql = "select sdt.id, sdt.name, dvn.name as division, dst.name as district from subdistrict as sdt 
                left join division as dvn on sdt.divisionId=dvn.id
                left join district as dst on sdt.districtId=dst.id" ;
        $table = mysqli_query($this->CN,$sql);

        while($row = mysqli_fetch_assoc($table))
        {
            $a[] = $row;
        }
        return $a;
    }

    public function SelectById()
    {
        $sql = "select id,name,divisionId,districtId from subdistrict  where id = ".$this->MS($this->Id);
        $table = (mysqli_query($this->CN,$sql));
        while($row = mysqli_fetch_assoc($table))
        {
            $this->Name = $row["name"];
            $this->DivisionId = $row["divisionId"];
            $this->DistrictId = $row["districtId"];
            return true;
        }
        $this->Error = mysqli_error($this->CN);
        return false;
    }







}
