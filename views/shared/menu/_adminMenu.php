<ul>
    <li><a href="?controller=division&view=index">Division</a></li>
    <li><a href="?controller=district">District</a></li>
    <li><a href="?controller=sub_district">Sub District</a></li>
    <li><a href="?controller=election">Election</a></li>
    <li><a href="?controller=candidate">Candidate</a></li>
    <li><a href="?controller=admin">Admin</a></li>
    <li><a href="?controller=voter">Voter</a></li>
    <li><a href="?controller=result">Result</a></li>

    <?php
    if(isset($_SESSION['type']) && $_SESSION['type'] == "SA")
    {
        print '<li><a href="?controller=admin">'.$_SESSION['name'].'</a></li>';
        print '<li><a href="?controller=account&view=logout">Logout</a></li>';
    }
    else{
        print '<li><a href="?controller=account&view=login">Login</a></li>';
    }
    ?>
</ul>
