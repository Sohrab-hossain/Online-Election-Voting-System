<?php

class Election extends Base
{
    public $Id;
    public $District_Id;
    public $StartTime;
    public $EndTime;
    public $Candidate_Id_1;
    public $Candidate_Id_2;
    public $Candidate_Id_3;
    public $Candidate_Id_4;
    public $Candidate_Id_5;


    public function Insert()
    {
        $sql = "insert into election (districtId,startTime,endTime,candidateId1,candidateId2,candidateId3,
                 candidateId4,candidateId5,createDate) values(
                ".$this->MS($this->District_Id).",
                '".$this->MS($this->StartTime)."',
                '".$this->MS($this->EndTime)."',
                ".$this->MS($this->Candidate_Id_1).",
                ".$this->MS($this->Candidate_Id_2).",
                ".$this->MS($this->Candidate_Id_3).",
                ".$this->MS($this->Candidate_Id_4).",
                ".$this->MS($this->Candidate_Id_5).",
                '".date("Y-m-d")."'
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

    public function Select()
    {
        $sql = "select 	elc.districtId,elc.startTime,elc.endTime,elc.createDate,
                cnd.name as candidate_1,cnd.name as candidate_2,cnd.name as candidate_3,
                cnd.name as candidate_4,cnd.name as candidate_5,
                cnd.canPartySymbol,cnd.canImage,canDetailsPdf            
                                                             
                from election as elc
                left join candidate as cnd on elc.candidateId1 =cnd.id
                and elc.candidateId2 =cnd.id and elc.candidateId3 =cnd.id
                and elc.candidateId4 =cnd.id and elc.candidateId5 =cnd.id                       
                 ";
    }




}