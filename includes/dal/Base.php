<?php
/**
 * Created by PhpStorm.
 * User: S.H.Zafran
 * Date: 20-Jul-18
 * Time: 10:24 PM
 */

class Base
{
    public $CN;
    public $Error;

    public function __construct()
    {
        $this->CN = mysqli_connect("localhost","root", "", "online_voting_db");
    }
    public function MS($value)
    {
        return mysqli_real_escape_string($this->CN, $value);
    }

}