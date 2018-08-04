<?php
/**
 * Created by PhpStorm.
 * User: S.H.Zafran
 * Date: 30-Jul-18
 * Time: 11:24 PM
 */

class District extends Base
{
    public $Id;
    public $Name;
    public $DivisionId;

    public function Insert()
    {
        $sql = "insert into district (name, divisionId) values('".$this->MS($this->Name)."',".$this->MS($this->DivisionId).")";
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
        $sql = "update district set name = '".$this->MS($this->Name)."', 
        divisionId= ".$this->MS($this->DivisionId)." where id = ".$this->MS($this->Id);
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
        $sql = "delete from district where id = ".$this->MS($this->Id);
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
        $sql = "select dst.id, dst.name, dv.name as division from district as dst left join division as dv on dst.divisionId=dv.id" ;
        $table = mysqli_query($this->CN,$sql);

        while($row = mysqli_fetch_assoc($table))
        {
            $a[] = $row;
        }
        return $a;
    }

    public function SelectById()
    {
        $sql = "select id, name, divisionId from district  where id = ".$this->MS($this->Id);
        $table = (mysqli_query($this->CN,$sql));
        while($row = mysqli_fetch_assoc($table))
        {
            $this->Name = $row["name"];
            $this->CountryId = $row["countryId"];
            return true;
        }
        $this->Error = mysqli_error($this->CN);
        return false;
    }


}