<?php
/**
 * Created by PhpStorm.
 * User: S.H.Zafran
 * Date: 18-Jul-18
 * Time: 12:04 PM
 */

class Country extends Base
{
    public $Id;
    public $Name;


    public function Insert()
    {
        $sql = "insert into country (name) values('".$this->MS($this->Name)."')";
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
        $sql = "update country set name = '".$this->MS($this->Name)."' where id = ".$this->MS($this->Id);
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
        $sql = "delete from country where id = ".$this->MS($this->Id);
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
        $sql = "select id, name from country  where id = ".$this->MS($this->Id);
        $table = (mysqli_query($this->CN,$sql));
        while($row = mysqli_fetch_assoc($table))
        {
            $this->Name = $row["name"];
            return true;
        }
        $this->Error = mysqli_error($this->CN);
        return false;
    }
    public function Select()
    {
        $a = array();
        $sql = "select id, name from country" ;
        $table = (mysqli_query($this->CN,$sql));

        while($row = mysqli_fetch_assoc($table))
        {
            $a[] = $row;
        }
        return $a;
    }

}
?>