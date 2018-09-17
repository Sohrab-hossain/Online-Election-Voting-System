<?php
createLink();
$elc = new Election();

//if(isset($_GET['id']))
//{
//    $elc->Id = base64_decode($_GET['id']);
//    commonDelete($elc);
//}
//
//$elc->Select();
include('views/election/voting.php');

?>





<!--<div class="voteField">-->
<!--    <div class="candidateName">-->
<!--        <p>Sohrab Hossain</p>-->
<!--    </div>-->
<!--    <div class="candidatePartySymbol">-->
<!--        <img src="uploads/candidate/candidate_Party_Symbols/1_20170425_103221-e1523141812150.jpg" height="110px" width="100px"/>-->
<!--    </div>-->
<!--    <div class="candidateImage">-->
<!--        <img src="uploads/candidate/candidate_Images/1_home4.jpg" height="100px" width="100px"/>-->
<!--        <br><a href="uploads/candidate/candidate_Details_Pdf/5_home4.jpg">Candidate Details</a>-->
<!--    </div>-->
<!---->
<!--</div>-->
