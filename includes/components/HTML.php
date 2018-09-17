<?php
/**
 * Created by PhpStorm.
 * User: S.H.Zafran
 * Date: 19-Jul-18
 * Time: 3:31 PM
 */

class HTML
{

    public function __construct()
    {
    }

    public function formBegin($attributes="")
    {
        print "<form method=\"post\" action=\"\" $attributes>\n";
    }

    public function textField($name, $value, $error = "")
    {
        print "<div class=\"form-group\">\n";
        print "<label>".ucwords($name)."</label>\n";
        print "<input type=\"text\" name=\"$name\" id=\"$name\" class=\"form-control\" value=\"$value\"/>\n";
        print " <span class=\"error\" id=\"e$name\">$error</span>\n";
        print " </div>\n";
    }

    public function textArea($name, $value = "", $error = "")
    {
        print "<div class=\"form-group\">\n
		<label>".ucwords($name)."</label>\n
		<textarea name=\"$name\" id=\"$name\" class=\"form-control\">".$value."</textarea>\n
		<span class=\"error\" id=\"e$name\">$error</span>\n
		</div>\n";
    }

    public function dateField($name, $value, $error = "")
    {
        print "<div class=\"form-group\">\n
		<label>".ucwords($name)."</label>\n
		<input type=\"date\" name=\"$name\" id=\"$name\" class=\"form-control\" value=\"$value\"/>\n
		<span class=\"error\" id=\"e$name\">$error</span>\n
		</div>\n";
    }
        public function timeField($name, $value, $error = "")
    {
        print "<div class=\"form-group\">\n
		<label>".ucwords($name)."</label>\n
		<input type=\"time\" name=\"$name\" id=\"$name\" class=\"form-control\" value=\"$value\"/>\n
		<span class=\"error\" id=\"e$name\">$error</span>\n
		</div>\n";
    }

    public function fileField($name, $error = "")
    {
        print "<div class=\"form-group\">\n
		<label>".ucwords($name)."</label>\n
		<input type=\"file\" name=\"$name\" id=\"$name\" class=\"form-control\"/>\n
		<span class=\"error\" id=\"e$name\">$error</span>\n
		</div>\n";
    }

    public function radioField($name, $array, $value, $error = "")
    {
        print "<div class=\"form-group\">\n
		<label>".ucwords($name)."</label><br />";

        foreach($array as $v)
        {
            if($value == $v)
            {
                print "<input type=\"radio\" name=\"$name\" id=\"$name\" value=\"$v\" Checked />$v\n";
            }
            else{
                print "<input type=\"radio\" name=\"$name\" id=\"$name\" value=\"$v\"/>$v\n";
            }
        }

        print "<span class=\"error\" id=\"e$name\">$error</span>\n
		</div>\n";
    }

    public function passwordField($name, $value, $error = "")
    {
        print "<div class=\"form-group\">\n
		<label>".ucwords($name)."</label>\n
		<input type=\"password\" name=\"$name\" id=\"$name\" class=\"form-control\" value=\"$value\"/>\n
		<span class=\"error\" id=\"e$name\">$error</span>\n
		</div>\n";
    }

    public function selectField($name, $table, $value = "0", $error = "")
    {
        print "<div class=\"form-group\">\n";
        print "<label>". ucwords($name) ."</label>\n";
		print "<select name =\"$name\" id =\"$name\" class=\"form-control\">\n";
		print "<option value =\"0\">Select</option>\n";

        foreach ($table as $row)
        {
            if($value == $row["id"])
            {
                print "<option value = \"".$row["id"]."\" selected>".$row["name"]."</option>\n";
            }
            else
            {
                print "<option value = \"".$row["id"]."\">".$row["name"]."</option>\n";
            }
        }
        print "</select>\n";
        print "<span class = \"error\" id = \"e$name\">$error</span></div>";
    }

    public function table($table)
    {
        print '<table class="table table-striped">'."\n";
        print '<tr>';
        foreach ($table as $row)
        {
            foreach ($row as $k=>$v)
                print "<th>".ucwords($k)."</th>";
            break;
        }
        print '<th>Edit | Delete</th></tr>';
        foreach ($table as $row)
        {
            print '<tr>';
            foreach ($row as $v)
            {
                print '<td>'.htmlentities($v).'</td>';
            }

            print '<td>'.editDeleteLink($row["id"]).'</td>';
            print '</tr>';
        }
        print '</table>';
    }

    public function submitField($name="submit", $value="Submit")
    {
        print "<input type=\"submit\" name=\"$name\" value=\"$value\"/>\n";
    }

    public function formEnd()
    {
        print "</form>\n";
    }



    public function successMessage($message)
    {
        print "<span class=\"alert-success\">$message</span>";
    }

    public function errorMessage($message)
    {
        print "<span class=\"alert-danger\">$message</span>";
    }

}