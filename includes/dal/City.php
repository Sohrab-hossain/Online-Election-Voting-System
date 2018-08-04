<?php
/**
 * Created by PhpStorm.
 * User: S.H.Zafran
 * Date: 18-Jul-18
 * Time: 11:49 PM
 */

class City extends Base
{
    public $Id;
    public $Name;
    public $CountryId;

    public function Insert()
    {
        $sql = "insert into city (name, countryId) values('".$this->MS($this->Name)."',".$this->MS($this->CountryId).")";
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
        $sql = "update city set name = '".$this->MS($this->Name)."', 
        countryId= ".$this->MS($this->CountryId)." where id = ".$this->MS($this->Id);
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
        $sql = "delete from city where id = ".$this->MS($this->Id);
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

    public function SelectById()
    {
        $sql = "select id, name, countryId from city  where id = ".$this->MS($this->Id);
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
    public function Select()
    {
        $a = array();
        $sql = "select ct.id, ct.name, cn.name as country from city as ct left join country as cn on ct.countryId=cn.id" ;
        $table = mysqli_query($this->CN,$sql);

        while($row = mysqli_fetch_assoc($table))
        {
            $a[] = $row;
        }
        return $a;
    }
}


?>